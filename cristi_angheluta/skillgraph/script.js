
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
  },
  week2: {
    "cristi": null,
    "adi":  {
      "HTML" : 10,
      "CSS" : 6,
      "JavaScript" : 5,
      "Tailwind" : 6,
      "PHP" : 7,
      "Laravel" : 3,
      "VueJS": 5
    },
    "vlad": null,
    "alexandra": null,
    "adelina": null
  },
  week3: {
    "cristi": null,
    "adi":  {
      "HTML" : 2,
      "CSS" : 9,
      "JavaScript" : 9,
      "Tailwind" : 9,
      "PHP" : 9,
      "Laravel" : 9,
      "VueJS": 9
    },
    "vlad": null,
    "alexandra": null,
    "adelina": null
  },
  
  week4: {
    "cristi": null,
    "adi": null,
    "vlad": null,
    "alexandra": null,
    "adelina": null
  },
  
  week5: {
    "cristi": null,
    "adi": null,
    "vlad": null,
    "alexandra": null,
    "adelina": null
  },
  
  week6: {
    "cristi": null,
    "adi": null,
    "vlad": null,
    "alexandra": null,
    "adelina": null
  },
  
  week7: {
    "cristi": null,
    "adi": null,
    "vlad": null,
    "alexandra": null,
    "adelina": null
  },
  
  week8: {
    "cristi": null,
    "adi": null,
    "vlad": null,
    "alexandra": null,
    "adelina": null
  },
  
  week9: {
    "cristi": null,
    "adi": null,
    "vlad": null,
    "alexandra": null,
    "adelina": null
  },
  
  week10: {
    "cristi": null,
    "adi": null,
    "vlad": null,
    "alexandra": null,
    "adelina": null
  },
  
  week11: {
    "cristi": null,
    "adi": null,
    "vlad": null,
    "alexandra": null,
    "adelina": null
  },
  
  week12: {
    "cristi": null,
    "adi": null,
    "vlad": null,
    "alexandra": null,
    "adelina": null
  },
  
  week13: {
    "cristi": null,
    "adi": null,
    "vlad": null,
    "alexandra": null,
    "adelina": null
  },
  
  week14: {
    "cristi": null,
    "adi": null,
    "vlad": null,
    "alexandra": null,
    "adelina": null
  },
  
  week15: {
    "cristi": null,
    "adi": null,
    "vlad": null,
    "alexandra": null,
    "adelina": null
  },
}


function createGraph(data) {
  let keys = Object.keys(data); 
  let target = document.getElementById("container-graph")

  // create a container for graphic
    
  let container = document.createElement("div")
    container.className= "container-skills"

    //add tailwind classes 
    //container.classList.add("ceva","alceva")

    target.appendChild(container)
  for (const key of keys) {
    
    
    //create a row element
    let row = document.createElement("div");
    row.className = "row";
    //add tailwind classes 
    //row.classList.add("ceva","alceva")
    container.appendChild(row);
    

    //create a label for our skills

    let text = document.createElement("p");
    text.innerHTML = key;
    //add tailwind classes 
    //text.classList.add("ceva","alceva")
    row.appendChild(text)
    

    //create an inactiveBar container for active SkillBar

    let inactiveBar = document.createElement("div");
    inactiveBar.className = "inactive-skill-bar";
    //add tailwind classes 
    //inactiveBar.classList.add("ceva","altceva")
    row.appendChild(inactiveBar);

    //create an active SkillBar 

    let skillBar = document.createElement("div");
    skillBar.className = "skill-bar";
    //add tailwind classes 
    //skillBar.classList.add("ceva","alceva")
    
    inactiveBar.appendChild(skillBar);
    animateGraph(skillBar, data[`${key}`] );
    //call animateGraph to animate active skillBar
    
  }
}
  //animate function 
function animateGraph(elem, rating) {
  elem.animate([{ width: '0px' }, { width: `${rating*10}`+"%" }], {duration: 1500});
  //animate width
  elem.style.width = `${rating*10}%`
  //set width after executing the animation
}

function createWeeklyGraph(val, name) {
  //iterate through object keys => array with weeks
  let keys = Object.keys(techSkills);

  let target = document.getElementById("weekly-graph")
  //target container for barchart and percents

  let containerPercents = document.createElement("div")
  // container for percents

  let percent100 = document.createElement("p")
  let percent50 = document.createElement("p")
  let percent0 = document.createElement("p")
  // create p elements

  let text100 = document.createTextNode("100%")
  let text50 = document.createTextNode("50%")
  let text0 = document.createTextNode("0%")
  //create text 

  percent100.appendChild(text100);
  percent50.appendChild(text50);
  percent0.appendChild(text0)
  //append text to created elements
  
  containerPercents.appendChild(percent100)
  containerPercents.appendChild(percent50)
  containerPercents.appendChild(percent0)
  //append elements with text to container

  containerPercents.id="container-percents"
  // give id to container percents to easily target it
  target.appendChild(containerPercents)
  //append container percents to barchart and percents container

  if(document.getElementById("bar-chart") !== null) {
    document.getElementById("bar-chart").remove()
    document.getElementById("label-id").remove()
    document.getElementById("container-percents").remove()
    //reinitialize bar chart, container percents and the label if they are already created
  }
  let label = document.createElement("h2") 
  let text = document.createTextNode(val)
  label.appendChild(text)
  label.id = "label-id"
  document.getElementById("container-weekly-graph").insertBefore(label, document.getElementById("container-weekly-graph").childNodes[0])
  // create a label for bar chart HTML, CSS etc. val is already inputed by pressing the button
  
  let container = document.createElement("div")
  container.id = "bar-chart"
  target.appendChild(container) //create bars container and append to the barchart and percents container 
  
  for (const key of keys) {
    let column = document.createElement("div");
    // create bars

    column.style.width = `2vw`
    column.style.backgroundColor = "green"
    column.style.margin ="1vw"
    column.style.borderRadius ="2px"
    column.style.boxShadow = "1px 1px 10px #666"
    column.style.height = "1px"; //if it is null, the column have 1 px height
    // style for column

    let columnLabel = document.createElement("p");
    columnLabel.className = "column-label"
    columnLabel.appendChild(document.createTextNode(key)) //create and append a text defined by key (week1,week2) to a tooltip
    column.onmouseover = () => {
      columnLabel.style.display = "block"; //now you see the tooltip
    }
    column.onmouseout = () => {
      columnLabel.style.display = "none"; //now you don t see it
    }
    container.appendChild(column); //append column to bar chart container
    column.appendChild(columnLabel); //append tooltip to bar

    if(techSkills[`${key}`][`${name}`] !== null) { //if the property of obj["week5"]["adi"] is not null for ex 
      animateWeeklyGraph(column, techSkills[`${key}`][`${name}`][`${val}`]) //animate each column which is not 0
    } 
    
  } 
}
function animateWeeklyGraph(elem, rating) {
    elem.animate([{ height: '0px' }, { height: `${rating*30}`+"px" }], {duration: 1000});
    // animate bar
    elem.style.height = `${rating*30}px`
    //after animation is finished, set the height because it will go again to 1 px
}
