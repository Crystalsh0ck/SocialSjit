<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/themes/base/jquery-ui.css" type="text/css" media="all" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js" type="text/javascript"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js" type="text/javascript"></script>
<style  type="text/css">
    a{
        color:#ccc;
        font-size:12px;
    }
    h4{
        font-size:12px;
    }
    small{
        font-size:75%;
    }
    .column { width:33%; min-width:390px; float:left; padding-bottom:100px; }
    .portlet { margin:0 1em 1em 0; width:auto;  }
    .portlet-header { margin:0.4em; padding-bottom:4px; padding-left:0.5em; }
    .portlet-header .ui-icon { float:right; margin:5px; cursor:pointer;}
    .portlet-content { padding:0.4em; }
    .ui-sortable-placeholder { border:1px dotted black; visibility:visible !important; height:50px !important; }
    .ui-sortable-placeholder * { visibility:hidden; }
</style>
<div class="demo">

    <div class="column">

        <div class="portlet">
            <div class="portlet-header">Partyflock</div>
            <div class="portlet-content"><div id="accordion" style="width:350px;">
                    <?php
                    $xml = simplexml_load_file('http://partyflock.nl/feed/agenda/user/1251114.xml?time=' . time());
                    foreach ($xml->entry as $key => $value) {
                        // print_r($value);
                        $value->summary = str_replace(',', '<br/>', $value->summary);
                        $value->summary = str_replace('line-up:', '<h4>line-up:</h4>', $value->summary);
                        $value->summary = str_replace('href="', 'href="http://partyflock.nl', $value->summary);
                        echo ' <h3><a href="#">' . $value->title . '</a></h3>
                               <div>' . $value->summary . '</div>';
                    }
                    ?>   
                </div></div>
        </div>
    </div>

    <div class="column">
        <div class="portlet">
            <div class="portlet-header">Nu.nl</div>
            <div class="portlet-content"><div id="accordion" style="width:350px;">
                //<?php
                //$xml = simplexml_load_file('http://mobiel.nu.nl/open/rss?s=sport');
                //foreach ($xml->entry as $key=> $value){
                //    //print_r($xml);
               // }
                
               // ?>
            </div></div>
        </div>
    </div>

    <div class="column">
        <div class="portlet">
            <div class="portlet-header">Het weer</div>
            <div class="portlet-content">
                <div><iframe src="http://www.weeronline.nl/Go/ExternalWidgets/TwoDaysCity?gid=4058557&activityType=0" scrolling="no" frameborder="0" style="width: 328px; height: 278px; border: 0pt none; margin: 0pt; padding: 0pt; overflow: hidden;" ></iframe></div>
            </div>
        </div>
    </div>

</div>

<script>
    $( ".column" ).sortable({
        connectWith: ".column"
    });

    $( ".portlet" ).addClass( "ui-widget ui-widget-content ui-helper-clearfix ui-corner-all" )
    .find( ".portlet-header" )
    .addClass( "ui-widget-header ui-corner-all" )
    .prepend( "<span class='ui-icon ui-icon-minusthick'></span>")
    .end()
    .find( ".portlet-content" );

    $( ".portlet-header .ui-icon" ).click(function() {
        $( this ).toggleClass( "ui-icon-minusthick" ).toggleClass( "ui-icon-plusthick" );
        $( this ).parents( ".portlet:first" ).find( ".portlet-content" ).toggle();
    });

    $( ".column" ).disableSelection();
    
   
    $( "#accordion" ).accordion({
        animated: 'slow',
        autoHeight: false,
        event: "mouseover"
    });
</script>
