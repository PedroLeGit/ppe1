
    <style>
        .removeskill{
            font-size:40px !important;
            color: #b1b1b1;
        }
        .removeskill:hover{
            color:red;
        }
    </style>
    <h2>Ajoutez vos competences</h2>

    <div class="ui search">
        <div class="ui left icon input">
            <input id="search" class="prompt" type="text">
        </div>
    </div><br />
    <form class="ui form" method="POST">
        <div id="skills" class="field">

        </div>
        <input type="hidden" value="0" name="nbSkill" id="nbSkill"/>
        <button id="skillButton" class="ui button" type="submit" disabled>Valider</button>
    </form>


    <script>
        nop = "";
        $('.ui.search')
            .search({
                apiSettings: {
                    url: '<?php echo WEBROOT;?>api/skill/{query}'+nop
                },
                fields: {
                    results : 'items',
                    title   : 'label'
                },
                minCharacters : 1,
                transition: 'vertical flip',
                onSelect: function(result, response) {
                    nop += "/"+result['id_skill'];
                    addSkill(result['id_skill'],result['label']);
                    window.setTimeout(function(){
                        $("#search").val("");
                    }, 1);
                    verifSkill();
                }
            })
        ;

        function verifSkill(){
            if ($('#nbSkill').val() == 0) {
                $("#skillButton").prop("disabled", true);
            } else {
                $("#skillButton").prop("disabled", false);
            }
        }
        function addSkill(id,label){
            var nbSkill = parseInt($('#nbSkill').val()) + 1;
            if($('#skillIdIs'+id).length == 0){
                $("#skills").append(
                    "<div id='skillIdIs" + id + "' class=\"field\">" +
                    "   <input type='hidden' name='skillId" + nbSkill + "' value='" + id + "'/>   " +
                    "   <div class=\"two fields\">" +
                    "     <div class=\"field\">\n" +
                    "          <select class=\"ui search dropdown\" name=\"levelId" + nbSkill + "\" required>\n" +
                    "             <option value=\"\">Niveau de maitrise</option>\n" +
                    <?php
                    foreach ($levels as $level) {
                        echo ' "            <option value=\"' . $level['id_level'] . '\">' . $level['label'] . '</option>\n" +';
                    }
                    ?>
                    "           </select>\n" +
                    "       </div> " +
                    "       <div class=\"field\">\n" +
                    "           <input value=\"" + label + "\" readonly=\"\" type=\"text\">" +
                    "       </div>\n" +
                    "<i data-idskill='"+id+"' class=\" removeskill remove icon\"></i>" +
                    "   </div>" +
                    "</div>");
                $('#nbSkill').val(nbSkill);
                bind();
            }
        }
        function bind() {
            $(".removeskill").click(function () {
                var nbSkill = parseInt($('#nbSkill').val()) - 1;
                $('#skillIdIs' + $(this).data('idskill')).remove();
                $('#nbSkill').val(nbSkill);
            });
        }
    </script>