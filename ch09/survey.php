<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>설문조사</title>
        <link rel="stylesheet" type="text/css" href="../css/survey.css">
        <meta charset="utf-8">
        <script>
            function update(){
                var vote;
                var length =document.survey_form.composer.length;
                
                for(var i=0; i<length; i++){
                    if(document.survey_form.composer[i].checked==true){
                        vote=document.survey_form.composer[i].value;
                        break;
                    }
                }
            }
        </script>
    </head>
    <body>
        <?php
        // put your code here
        ?>
    </body>
</html>
