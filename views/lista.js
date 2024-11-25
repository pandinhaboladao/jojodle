//Busca uma lista de stands que começam com uma letra específica e se atualiza 
function mostrarStands(query) {
    //Se o campo tá vazio, não mostra nenhuma lista
    if (query.length === 0) {
        document.getElementById("lista").innerHTML = "";
        return;
    }

    //Usa o código do lista.php
    fetch("../controllers/lista.php?query=" + encodeURIComponent(query))
        .then(response => response.text()) //Converte para texto
        .then(data => document.getElementById("lista").innerHTML = data); //Atualiza a lista
}

//Preenche o campo com o stand que eu clicar na lista e limpa a lista
function selecionarStand(nome) {
    document.getElementById("stand_guess").value = nome; //Preecnhe o campo
    document.getElementById("lista").innerHTML = ""; //Limpa
}
