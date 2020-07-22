// object with our skills

const dataSkills = {
    "week1": {
      "andrei" : {
        "HTML" : 8,
        "CSS" : 7,
        "JavaScript" : 7,
        "Tailwind" : 6,
        "PHP" : 2,
        "Laravel" : 1,
        "VueJS": 1
  },
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
  
      animateGraph(skillBar, data[`${key}`] );
      //call animateGraph to animate active skillBar
      i++;//increment counter
  
    }
  }
    //animate function 
  function animateGraph(elem, rating) {
    elem.animate([{ width: '0px' }, { width: `${rating*20}`+"px" }], {duration: 2000});
    //animate width
    elem.style.width = `${rating*20}px`
    //set width after executing the animation
  }
  
  
  createGraph(dataSkills.week1.adi);//creating the skill graph