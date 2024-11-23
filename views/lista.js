function mostrarStands(query) {
    if (query.length === 0) {
        document.getElementById("lista").innerHTML = "";
        return;
    }

    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById("lista").innerHTML = xhr.responseText;
        }
    };
    xhr.open("GET", "../controllers/lista.php?query=" + encodeURIComponent(query), true);
    xhr.send();
}

function selecionarStand(nome) {
    document.getElementById("stand_guess").value = nome; // Preenche o campo com o nome selecionado
    document.getElementById("lista").innerHTML = ""; // Limpa a lista de sugestões
}
