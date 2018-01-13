<div class="ui container">
    <h1>Inscription</h1>
    <h2>Ajoutez vos competences</h2>

    <div class="ui search">
        <div class="ui left icon input">
            <input class="prompt" type="text">
        </div>
    </div>
    <script>
        $('.ui.search')
            .search({
                apiSettings: {
                    url: '<?php echo WEBROOT;?>api/skill/{query}'
                },
                fields: {
                    results : 'items',
                    title   : 'label'
                },
                minCharacters : 1,
                onSelect: function(result, response) {
                    console.log(result);
                }
            })
        ;
    </script>
</div>