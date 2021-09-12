var svgns = "http://www.w3.org/2000/svg";
let svg = document.querySelector("svg");
let redZone = true;

function redZoneFun() {
  redZone = true;
}
function blueZoneFun() {
  redZone = false;
}
document.getElementById("red-zone").addEventListener("click", redZoneFun);
document.getElementById("blue-zone").addEventListener("click", blueZoneFun);

function printMousePos(event) {
  let m = oMousePosSVG(event);
  x = m.x;
  y = m.y;
  function createCircle(circleClass, radius) {
    const circle = document.createElementNS(svgns, "circle");
    circle.setAttribute("class", circleClass);
    circle.setAttribute("cx", x);
    circle.setAttribute("cy", y);
    circle.setAttribute("r", radius);
    document.getElementById("map").appendChild(circle);
  }
  if (redZone) {
    createCircle("cls-14", 60);
  } else {
    createCircle("cls-15", 94.5);
    createCircle("cls-16", 48.5);
  }
}
document.getElementById("map").addEventListener("click", printMousePos);

function oMousePosSVG(e) {
  var p = svg.createSVGPoint();
  p.x = e.clientX;
  p.y = e.clientY;
  var ctm = svg.getScreenCTM().inverse();
  var p = p.matrixTransform(ctm);
  return p;
}

function submitMap() {
  var svg_code = document.getElementById("map_div").innerHTML;
  document.getElementById("map_code").value = svg_code;
}
function clearCircle() {
  console.log("called");
  d3.selectAll("circle").remove();
  submitMap();
}
document.getElementById("submit_map").addEventListener("click", submitMap);
document.getElementById("clear").addEventListener("click", clearCircle);
