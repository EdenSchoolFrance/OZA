
// Ceci est le script de la modal qui fonctionne en js pour le moment avec des donnes fixe mais par le passe de facon dynamique
// Script mis en pause il faut attendre le back pour continuer la modal pour eviter de refaire 30 fois la meme chose
let array_cat = ["Burreau", "Véhicule", "Engin"]
let array_data = [
    [
        ["Communication", "Téléphone filaire", "Téléphone DECT"],
        ["Bureautique", "Ordinateur","Ordinateur portable","Ecran supplémentaire"],
        ["Sous-catégorie 3", "Item 1", "Item 2", "Item 3"],
        ["Sous-catégorie 4", "Item 1", "Item 2", "Item 3"],
        ["Sous-catégorie 5", "Item 1", "Item 2", "Item 3"],
        ["Sous-catégorie 6", "Item 1", "Item 2", "Item 3"]
    ],
    [
        ["Communication", "Téléphone filaire", "Téléphone DECT"],
        ["Bureautique", "Ordinateur","Ordinateur portable","Ecran supplémentaire"],
        ["Sous-catégorie 3", "Item 1", "Item 2", "Item 3"],
        ["Sous-catégorie 4", "Item 1", "Item 2", "Item 3"],
        ["Sous-catégorie 5", "Item 1", "Item 2", "Item 3"],
        ["Sous-catégorie 6", "Item 1", "Item 2", "Item 3"]
    ],
    [
        ["Communication", "Téléphone filaire", "Téléphone DECT"],
        ["Bureautique", "Ordinateur","Ordinateur portable","Ecran supplémentaire"],
        ["Sous-catégorie 3", "Item 1", "Item 2", "Item 3"],
        ["Sous-catégorie 4", "Item 1", "Item 2", "Item 3"],
        ["Sous-catégorie 5", "Item 1", "Item 2", "Item 3"],
        ["Sous-catégorie 6", "Item 1", "Item 2", "Item 3"]
    ]
]


function queryModal(event) {
    let here = $('#query-material').val()
    let list = $('#list-material')
    let myReg = new RegExp(here + ".*")

    if (list.children()){
        for (let l = 0; l < list.children().length ; l++) {
            if (list.children()[l].value === here){
                console.log('oui')
            }
        }
    }
    list.html('')
    for (let i = 0; i < array_data.length; i++) {
        for (let j = 0; j < array_data[i].length; j++) {
            for (let k = 1; k < array_data[i][j].length; k++) {

                if (array_data[i][j][k].match(myReg)){
                    if (here){
                        let temp = document.createElement('option')
                        temp.innerText = array_cat[i]+" "+array_data[i][j][0]
                        temp.setAttribute('value',array_data[i][j][k])
                        temp.setAttribute("data-value",array_data[i][j][k]+"_"+i+"_"+j+"_"+k)
                        list.append(temp)
                    }
                }
            }
        }
    }
}

