$("#equipes").on("change", function(){
    $.ajax({
        url: 'idEquipe.php',
        type: 'POST',
        dataType: "json",
        data:{id:$("#equipes").val()},

        success: function(json)
        {   
            $("#id_equipes").val(json.id_equipes);
         },
        error: function(data)
        {
            $("#id_equipes").val("Houve um erro ao carregar");
        }
    });
});