    <h2>Ajoutez votre formation</h2>
    <form class="ui form" method="post">
        <div id="labelList" class="field">
            <div class="field">
                <input name="0" type="text" maxlength="100">
            </div>
        </div>
        <input name="nbFormation" id="nbFormation" type="hidden" value="0" >
        <button id="addLabel" type="button" class="ui inverted green button">+</button>
        <button class="ui button" type="submit" >Valider</button>
    </form>
    <script>
        $( "#addLabel" ).click(function() {
            var nb = $( "#nbFormation" ).val();
            var text = $( "input[name='"+nb+"']").val();
            console.log(nb+text);
            if(text != ""){
                var newnb = parseInt(nb)+1;
                $( "#labelList" ).append('<div class="field">\n' +
                    '                <input name="'+newnb+'" type="text" maxlength="100">\n' +
                    '            </div>');
                $( "#nbFormation" ).val(newnb);
            }
        });
    </script>
