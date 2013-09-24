<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">

<head>        
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />

    
    <title>Админ панель</title>
    
    <link href="/resourses/backend/css/stylesheets.css" rel="stylesheet" type="text/css" />      

    <link rel="icon" type="image/ico" href="favicon.ico"/>
    <!--<script type='text/javascript' src='/resourses/backend/js/plugins/jquery/jquery-1.9.1.min.js'></script>-->        
    <script type='text/javascript' src='/resourses/backend/js/plugins/jquery/jquery-ui-1.10.1.custom.min.js'></script>
    <script type='text/javascript' src='/resourses/backend/js/plugins/jquery/jquery-migrate-1.1.1.min.js'></script>
    <script type='text/javascript' src='/resourses/backend/js/plugins/jquery/globalize.js'></script>
    <script type='text/javascript' src='/resourses/backend/js/plugins/other/excanvas.js'></script>
    <script type='text/javascript' src='/resourses/backend/js/plugins/other/jquery.mousewheel.min.js'></script>
    <script type='text/javascript' src='/resourses/backend/js/plugins/bootstrap/bootstrap.min.js'></script>            
    <script type='text/javascript' src='/resourses/backend/js/plugins/cookies/jquery.cookies.2.2.0.min.js'></script>
    <script type='text/javascript' src='/resourses/backend/js/plugins/fancybox/jquery.fancybox.pack.js'></script>
    <script type='text/javascript' src='/resourses/backend/js/plugins/jflot/jquery.flot.js'></script>    
    <script type='text/javascript' src='/resourses/backend/js/plugins/jflot/jquery.flot.stack.js'></script>    
    <script type='text/javascript' src='/resourses/backend/js/plugins/jflot/jquery.flot.pie.js'></script>
    <script type='text/javascript' src='/resourses/backend/js/plugins/jflot/jquery.flot.resize.js'></script>
    <script type='text/javascript' src='/resourses/backend/js/plugins/epiechart/jquery.easy-pie-chart.js'></script>
    <script type='text/javascript' src='/resourses/backend/js/plugins/sparklines/jquery.sparkline.min.js'></script>    
    <script type='text/javascript' src='/resourses/backend/js/plugins/pnotify/jquery.pnotify.min.js'></script>
    <script type='text/javascript' src='/resourses/backend/js/plugins/fullcalendar/fullcalendar.min.js'></script>        
    <script type='text/javascript' src='/resourses/backend/js/plugins/datatables/jquery.dataTables.min.js'></script>    
    <script type='text/javascript' src='/resourses/backend/js/plugins/wookmark/jquery.wookmark.js'></script>        
    <script type='text/javascript' src='/resourses/backend/js/plugins/jbreadcrumb/jquery.jBreadCrumb.1.1.js'></script>
    <script type='text/javascript' src='/resourses/backend/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js'></script>
    <script type='text/javascript' src="/resourses/backend/js/plugins/uniform/jquery.uniform.min.js"></script>
    <script type='text/javascript' src="/resourses/backend/js/plugins/select/select2.min.js"></script>
    <script type='text/javascript' src='/resourses/backend/js/plugins/tagsinput/jquery.tagsinput.min.js'></script>
    <script type='text/javascript' src='/resourses/backend/js/plugins/maskedinput/jquery.maskedinput-1.3.min.js'></script>
    <script type='text/javascript' src='/resourses/backend/js/plugins/multiselect/jquery.multi-select.min.js'></script>    
    <script type='text/javascript' src='/resourses/backend/js/plugins/validationEngine/languages/jquery.validationEngine-en.js'></script>
    <script type='text/javascript' src='/resourses/backend/js/plugins/validationEngine/jquery.validationEngine.js'></script>        
    <script type='text/javascript' src='/resourses/backend/js/plugins/stepywizard/jquery.stepy.js'></script>
    <script type='text/javascript' src='/resourses/backend/js/plugins/animatedprogressbar/animated_progressbar.js'></script>
    <script type='text/javascript' src='/resourses/backend/js/plugins/hoverintent/jquery.hoverIntent.minified.js'></script>
    <script type='text/javascript' src='/resourses/backend/js/plugins/media/mediaelement-and-player.min.js'></script>    
    <script type='text/javascript' src='/resourses/backend/js/plugins/cleditor/jquery.cleditor.js'></script>
    <script type='text/javascript' src='/resourses/backend/js/plugins/shbrush/shCore.js'></script>
    <script type='text/javascript' src='/resourses/backend/js/plugins/shbrush/shBrushXml.js'></script>
    <script type='text/javascript' src='/resourses/backend/js/plugins/shbrush/shBrushJScript.js'></script>
    <script type='text/javascript' src='/resourses/backend/js/plugins/shbrush/shBrushCss.js'></script>    
    <script type='text/javascript' src='/resourses/backend/js/plugins/filetree/jqueryFileTree.js'></script>        
    <script type='text/javascript' src='/resourses/backend/js/plugins/slidernav/slidernav-min.js'></script>    
    <script type='text/javascript' src='/resourses/backend/js/plugins/isotope/jquery.isotope.min.js'></script>    
    <script type='text/javascript' src='/resourses/backend/js/plugins/jnotes/jquery-notes_1.0.8_min.js'></script>
    <script type='text/javascript' src='/resourses/backend/js/plugins/jcrop/jquery.Jcrop.min.js'></script>
    <script type='text/javascript' src='/resourses/backend/js/plugins/ibutton/jquery.ibutton.min.js'></script>    
    <script type='text/javascript' src='/resourses/backend/js/plugins.js'></script>
    <script type='text/javascript' src='/resourses/backend/js/charts.js'></script>
    <script type='text/javascript' src='/resourses/backend/js/actions.js'></script>
</head>
<body>
    
    <div class="header">
        <a href="/admin/" class="logo"></a>
        <div class="buttons">
            <div class="dropdown">
                <div class="label" style="position:relative;top:-2px;"><span class="icos-user2"></span></div>
                <div class="body" style="width: 160px;">
                    <div class="itemLink">
                        <a href="/admin/profile"><span class="icon-cog icon-white"></span> Мой профиль</a>
                    </div>
                    <div class="itemLink">
                        <a href="#"><span class="icon-comment icon-white"></span> Сообщения</a>
                    </div>                    
                </div>                
            </div> 
           <a href="/" class="btn btn-link tipb" data-original-title="Открыть сайт" onclick="window.open($(this).attr('href')); return false;"><i class="icos-enter"></i></a>
           <a href="/logout" class="btn btn-link tipb" data-original-title="Выход"><i class="icos-exit"></i></a>  
        </div>
    </div>
    <?=$content;?>

    
 
  <script type="text/javascript">
    $(document).ready(function () { $("#editor").cleditor(); });
  </script>
</body>

</html>
