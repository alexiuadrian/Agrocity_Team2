
// object with our skills
const techSkills = {
  "week1": {
    "cristi" : {
      "HTML" : 7,
      "CSS" : 8,
      "JavaScript" : 8,
      "Tailwind" : 7,
      "PHP" : 7,
      "Laravel" : 6,
      "VueJS": 5
    },
    "adi" : {
      "HTML" : 7,
      "CSS" : 7,
      "JavaScript" : 4,
      "Tailwind" : 3,
      "PHP" : 9,
      "Laravel" : 1,
      "VueJS": 2
    },
    "vlad" : {
      "HTML" : 7,
      "CSS" : 6,
      "JavaScript" : 5,
      "Tailwind" : 6,
      "PHP" : 7,
      "Laravel" : 3,
      "VueJS": 5
    },
    "alexandra" : {
      "HTML" : 7,
      "CSS" : 6,
      "JavaScript" : 4,
      "Tailwind" : 5,
      "PHP" : 7,
      "Laravel" : 5,
        "VueJS": 6
    },
    "adelina" : {
      "HTML" : 10,
      "CSS" : 8,
      "JavaScript" : 7,
      "Tailwind" : 7,
      "PHP" : 3,
      "Laravel" : 2,
      "VueJS": 2
    }
  }
}

var status = true;

function createGraph(data) {
  let i = 0; //counter for elements
  let index = Object.keys(data);
  let target = document.getElementById("container-graph")
  let container = document.createElement("div")
    container.className= "container-skills"
    target.appendChild(container)
  for (const key of index) {
    
    // create a container for graphic
    
    //create a row element
    let row = document.createElement("div");
    row.className = "row";
    container.appendChild(row);

    //create a label for our skills

    let text = document.createElement("p");
    text.innerHTML = key;
    row.appendChild(text)
    
    //create an inactiveBar container for active SkillBar

    let inactiveBar = document.createElement("div");
    inactiveBar.className = "inactive-skill-bar";
    row.appendChild(inactiveBar);

    //create an active SkillBar 

    let skillBar = document.createElement("div");
    skillBar.className = "skill-bar";
    inactiveBar.appendChild(skillBar);
    animateGraph(skillBar, data[`${key}`] );
    //call animateGraph to animate active skillBar
    
  }
}
  //animate function 
function animateGraph(elem, rating) {
  elem.animate([{ width: '0px' }, { width: `${rating*10}`+"%" }], {duration: 2000});
  //animate width
  elem.style.width = `${rating*10}%`
  //set width after executing the animation
}

//creating the skill graph
