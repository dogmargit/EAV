<?php
/**
 * @property string $savePath путь к директории, в которой сохраняем файлы
 */
class UploadBehavior extends CActiveRecordBehavior{
    /**
     * @var string название атрибута, хранящего в себе имя файла и файл
     */
    public $attributeName='pic';
    /**
     * @var array сценарии валидации к которым будут добавлены правила валидации
     * загрузки файлов
     */
    public $scenarios=array('insert','update');
    /**
     * @var string типы файлов, которые можно загружать (нужно для валидации)
     */
    public $fileTypes='jpg,png,jpeg';
    /**
     * @var bool генерировать ли миниатюру
     */
    public $thumbs=true;
    /**
     * @var bool удалить ли старую при загрузке?
     */
    public $uploadNew=false;
    /**
     * @return string путь к директории, в которой сохраняем файлы
     */
    public function getSavePath(){
        return Yii::app()->params['pic_path'];
    }
 
    public function attach($owner){
        parent::attach($owner);
 
        if(in_array($owner->scenario,$this->scenarios)){
            // добавляем валидатор файла
            $fileValidator=CValidator::createValidator('file',$owner,$this->attributeName,
                array('types'=>$this->fileTypes,'allowEmpty'=>true));
            $owner->validatorList->add($fileValidator);
        }
    }
 
    // имейте ввиду, что методы-обработчики событий в поведениях должны иметь
    // public-доступ начиная с 1.1.13RC
    public function beforeSave($event){
        if(in_array($this->owner->scenario,$this->scenarios))
        {
            // удаляем главную картинку и миниатюру (если нужно)
            if($this->owner->pic_del or $this->uploadNew)
            {
                 $this->deleteFile();
                 $this->owner->setAttribute($this->attributeName,$uniqueName);
            }
            if(($file=CUploadedFile::getInstance($this->owner,$this->attributeName)))
            {

                // присваиваем уникальное имя
                $uniqueName = md5(microtime('1')) . '.' . (end(explode('.', $file->name)));
                $this->owner->setAttribute($this->attributeName,$uniqueName);
                $file->saveAs($this->savePath.$uniqueName);
                // загружаем миниатюру
                if($this->thumbs)
                { 
                    $image = new EasyImage(Yii::app()->params['pic_path'].$uniqueName);
                    $image->resize(Yii::app()->params['pic_small_size']);
                    $image->save(Yii::app()->params['pic_small_path'].$uniqueName);
                }
            }
        }

        return true;
    }
 
    // имейте ввиду, что методы-обработчики событий в поведениях должны иметь
    // public-доступ начиная с 1.1.13RC
    public function beforeDelete($event){
        $this->deleteFile(); // удалили модель? удаляем и файл, связанный с ней
    }
    
    // Удаляем найденные картинки
    public function deleteFile()
    {
        foreach (array(Yii::app()->params['pic_path'], Yii::app()->params['pic_small_path']) as $path)
        {
            $file=$path.$this->getOwner()->{$this->attributeName};
            if(is_file($file))
                unlink($file);
        }
    }
}