var jsn; // saves the json object as string
document.querySelector("#read-button").addEventListener('click', function () {
    if (document.querySelector("#file-input").files.length == 0) {
        alert('Error : No file selected');
        return;
    }

    // first file selected by user
    var file = document.querySelector("#file-input").files[0];

    // read the file
    var reader = new FileReader();

    // file reading finished successfully
    reader.addEventListener('load', function (e) {
        var text = e.target.result;
        console.log(text);
        jsn = text;
    });

    // file reading had an error
    reader.addEventListener('error', function () {
        alert('Error : Failed to read file');
    });

    reader.readAsText(file);
});

// function gets called when pressing Click 4 json
function makejson(jsonObject) {
    // converts string in json object
    var jsonObj = JSON.parse(jsonObject);
    createGraph(jsonObj.week1.adi); // creating the skill graph
}


function createGraph(data) {
    let i = 0; //counter for elements

    let index = Object.keys(data);

    for (const key of index) {

        // create a row div 

        const row = document.createElement("div");
        row.className = "row";
        document.getElementById("container-skills").appendChild(row);

        //create a label for our skills

        const text = document.createElement("p");
        text.innerHTML = key;
        document.getElementsByClassName("row")[i].appendChild(text)

        //create an inactiveBar container for active SkillBar

        const inactiveBar = document.createElement("div");
        inactiveBar.className = "inactive-skill-bar";
        document.getElementsByClassName("row")[i].appendChild(inactiveBar);

        //create an active SkillBar 

        const skillBar = document.createElement("div");
        skillBar.className = "skill-bar";
        document.getElementsByClassName("inactive-skill-bar")[i].appendChild(skillBar);

        animateGraph(skillBar, data[`${key}`]);
        //call animateGraph to animate active skillBar
        i++;//increment counter

    }
}

//animate function 
function animateGraph(elem, rating) {
    elem.animate([{ width: '0px' }, { width: `${rating * 20}` + "px" }], { duration: 2000 });
    //animate width
    elem.style.width = `${rating * 20}px`
    //set width after executing the animation
}