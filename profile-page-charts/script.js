let techSkills = {};
let softSkills = {};

function createGraph(data, label) {
  let keys = Object.keys(data);
  let target = document.getElementById("container-graph");

  // create a container for graphic

  let container = document.createElement("div");
  let header = document.createElement("h3");
  header.innerText = label;
  //add tailwind classes
  container.classList.add(
    "lg:w-1/2",
    "lg:mx-5",
    "border",
    "border-gray-300",
    "rounded-md",
    "shadow-md",
    "overflow-hidden",
    "my-5",
    "pb-10"
  );
  header.classList.add(
    "text-3xl",
    "font-bold",
    "text-center",
    "text-gray-800",
    "py-6",
    "border-b",
    "bg-gray-100",
    "mb-10"
  );

  target.appendChild(container);
  container.appendChild(header);

  for (const key of keys) {
    //create a row element
    let row = document.createElement("div");
    row.className = "text-gray-800 text-base font-bold px-20";

    container.appendChild(row);

    //create a label for our skills

    let p = document.createElement("p");

    let text = document.createTextNode(key);

    p.appendChild(text);
    row.appendChild(p);

    //create an inactiveBar container for active SkillBar

    let inactiveBar = document.createElement("div");
    inactiveBar.className = "h-5 bg-gray-400 mb-5";
    row.appendChild(inactiveBar);

    //create an active SkillBar
    let skillBar = document.createElement("div");
    skillBar.className =
      "relative bg-green-500 rounded-sm h-full cursor-pointer allSkillBars";
    skillBar.style.width = "2px";

    //create a skillBar label
    let skillBarLabel = document.createElement("div");
    skillBarLabel.innerText = data[`${key}`] * 10 + "%";
    skillBarLabel.className =
      "right-label z-10 hidden absolute bg-orange-600 px-3 py-1 rounded-md font-semibold text-white text-sm";
    skillBar.appendChild(skillBarLabel);

    skillBar.onmouseover = () => {
      skillBarLabel.style.display = "block"; //now you see the tooltip
    };
    skillBar.onmouseout = () => {
      skillBarLabel.style.display = "none"; //now you don t see it
    };

    //aici am schimbat
    let dataVal = data[`${key}`];
    inactiveBar.appendChild(skillBar);
    skillBar.dataset.value = `${dataVal}`;

    //call animateGraph to animate active skillBar
  }
}

//animate function

//aici am schimbat
function animateGraph() {
  let allBars = document.getElementsByClassName("allSkillBars");
  for (const key of allBars) {
    let dataVal = key.dataset.value;
    key.animate([{ width: "0px" }, { width: `${dataVal * 10}` + "%" }], {
      duration: 1500,
    });
    //animate width
    key.style.width = `${dataVal * 10}%`;
    //set width after executing the animation
  }
  document.onscroll = null;
}

function createWeeklyGraph(name, val, id) {
  //iterate through object keys => array with weeks
  let data;
  if (id === "hard") {
    data = techSkills;
  } else if (id === "soft") {
    data = softSkills;
  }
  let keys = Object.keys(data);

  let target = document.getElementById("weekly-graph-" + id);
  //target container for barchart and percents

  let containerPercents = document.createElement("div");
  // container for percents

  let percent100 = document.createElement("p");
  let percent50 = document.createElement("p");
  let percent0 = document.createElement("p");
  // create p elements

  let text100 = document.createTextNode("100%");
  let text50 = document.createTextNode("50%");
  let text0 = document.createTextNode("0%");
  //create text

  percent100.appendChild(text100);
  percent50.appendChild(text50);
  percent0.appendChild(text0);
  //append text to created elements

  containerPercents.appendChild(percent100);
  containerPercents.appendChild(percent50);
  containerPercents.appendChild(percent0);
  //append elements with text to container

  containerPercents.id = "container-percents-" + id;
  // give id to container percents to easily target it
  target.appendChild(containerPercents);
  containerPercents.className =
    "h-full flex flex-col justify-between mr-3 text-right font-semibold text-gray-500";
  //append container percents to barchart and percents container

  if (document.getElementById("bar-chart-" + id) !== null) {
    document.getElementById("bar-chart-" + id).remove();
    document.getElementById("container-percents-" + id).remove();
    //reinitialize bar chart, container percents and the label if they are already created
  }

  let container = document.createElement("div");
  container.id = "bar-chart-" + id;
  container.className = "w-full flex h-full border-l items-end";
  target.appendChild(container); //create bars container and append to the barchart and percents container

  for (const key of keys) {
    let column = document.createElement("div");
    // create bars

    column.className =
      " relative bg-green-500 flex-1 hover:bg-orange-500 cursor-pointer h-2 rounded-sm";
    column.style.margin = "0 1%";

    let columnLabel = document.createElement("p");
    columnLabel.className =
      "centered-label hidden z-10 absolute bg-orange-700 px-3 py-1 rounded-md font-semibold text-white text-sm";
    column.onmouseover = () => {
      columnLabel.style.display = "block"; //now you see the tooltip
    };
    column.onmouseout = () => {
      columnLabel.style.display = "none"; //now you don t see it
    };
    columnLabel.appendChild(document.createTextNode(key)); //create and append a text defined by key (week1,week2) to a tooltip
    container.appendChild(column); //append column to bar chart container
    column.appendChild(columnLabel); //append tooltip to bar

    if (data[`${key}`][`${name}`] !== null) {
      //if the property of obj["week5"]["adi"] is not null for ex
      animateWeeklyGraph(column, data[`${key}`][`${name}`][`${val}`]); //animate each column which is not 0
    }
  }
}

function animateWeeklyGraph(elem, rating) {
  elem.animate([{ height: "0px" }, { height: `${rating * 10}` + "%" }], {
    duration: 1000,
  });
  // animate bar
  elem.style.height = `${rating * 10}%`;
  //after animation is finished, set the height because it will go again to 1 px
}

function generateAllGraphs(name) {
  "user strict";

  fetch("skills.json")
    .then(function (resp) {
      return resp.json();
    })
    .then(function (data) {
      // JSON-ul contine acum ambele tipuri de skill-uri
      techSkills = data["hard"];
      softSkills = data["soft"];

      // Codul din HTML de generat graficele
      createGraph(techSkills["Week 2"][`${name}`], "Hard skills");
      createGraph(softSkills["Week 2"][`${name}`], "Soft skills");
      let element = document.getElementById("container-graph");
      let position = element.getBoundingClientRect().top - 165;
      document.onscroll = function trigger() {
        if (window.scrollY >= position) {
          animateGraph();
        }
      };
      createWeeklyGraph(`${name}`, "HTML", "hard");
      createWeeklyGraph(`${name}`, "Comunicare", "soft");

      // Make initial active buttons
      let btnsHardSection = document.getElementById("buttons__section-hard");
      let btnsSoftSection = document.getElementById("buttons__section-soft");

      let btnsHard = btnsHardSection.getElementsByTagName("button");
      let btnsSoft = btnsSoftSection.getElementsByTagName("button");

      let btnHardActive = document.getElementById("hard-active-btn");
      let btnSoftActive = document.getElementById("soft-active-btn");

      for (const btn of btnsHard) {
        btn.addEventListener("click", () => {
          btnHardActive.classList.remove("bg-orange-500");
          btnHardActive.classList.add("bg-green-500");
        });
      }

      for (const btn of btnsSoft) {
        btn.addEventListener("click", () => {
          btnSoftActive.classList.remove("bg-orange-500");
          btnSoftActive.classList.add("bg-green-500");
        });
      }
    });
}