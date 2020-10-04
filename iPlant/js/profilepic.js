function getRandomImage() {
var images = ['img/tree1.png', 'img/tree2.png', 'img/tree3.png'];
var image = images[Math.floor(Math.random()*images.length)];
 
return image;
}
 
function displayRandomImage() {
var htmlImage = document.getElementById("profilepic");
htmlImage.src = getRandomImage();
}
displayRandomImage();