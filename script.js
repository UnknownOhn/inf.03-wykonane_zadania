document.getElementById("dodaj").addEventListener("click", function(){
    const produkt = document.getElementById("produkt").value;
    const cena = document.getElementById("cena").value;
    const ilosc = document.getElementById("ilosc").value;

    console.log(produkt, cena, ilosc);

    const lista_produktow = document.getElementById("lista_produktow");
    const li = document.createElement("li");
    li.textContent = produkt + " - ilosc: " + ilosc + " - cena: " + cena + "zł";
    lista_produktow.appendChild(li);

});