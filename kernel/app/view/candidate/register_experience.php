    <h2>Ajoutez vos experiences</h2>
    <form class="ui form" method="post">
        <div id="labelList" class="field">
            <div class="field">
                <input name="0" type="text" maxlength="100">
            </div>
        </div>
        <input name="nbExp" id="nbExp" type="hidden" value="0" >
        <button id="addLabel" type="button" class="ui inverted green button">+</button>
        <button class="ui button" type="submit" >Valider</button>
    </form>
    <script>
        $( "#addLabel" ).click(function() {
            var nb = $( "#nbExp" ).val();
            var text = $( "input[name='"+nb+"']").val();
            console.log(nb+text);
            if(text != ""){
                var newnb = parseInt(nb)+1;
                $( "#labelList" ).append('<div class="field">\n' +
                    '                <input name="'+newnb+'" type="text" maxlength="100">\n' +
                    '            </div>');
                $( "#nbExp" ).val(newnb);
            }
        });
    </script>