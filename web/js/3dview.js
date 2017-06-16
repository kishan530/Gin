var scene, camera, renderer;
var geometry, material, mesh, outerCylinderMesh, innerCylinderMesh, controls;

//init();
//animate();

function init(url) {
     var el = document.getElementById('prev');
     //alert(el);
     //alert(url);
    var url = '/designs/'+url;
     scene = new THREE.Scene();
     camera = new THREE.PerspectiveCamera( 75, window.innerWidth / window.innerHeight, 1, 1000 );
					
					
//alert('camera');
					 renderer = new THREE.WebGLRenderer();
					//renderer.setSize( window.innerWidth*0.8, window.innerHeight );
					//renderer.setSize( el[0].offsetWidth, window.innerHeight );
     renderer.setSize( window.innerWidth/2, window.innerHeight/2 );
					//el.children.remove();
                    el.innerHTML = '';
					el.appendChild( renderer.domElement );
                    //el.replaceChild(renderer.domElement, el.childNodes[0]);
					var texture = THREE.ImageUtils.loadTexture(url);
					var material =  new THREE.MeshBasicMaterial( {map: texture}) ;
                    //alert('material');
					controls = new THREE.TrackballControls( camera, renderer.domElement );
					controls.rotateSpeed = 4.0;
					
					//alert('controls');
					var outerCylinderGeometry = new THREE.CylinderGeometry( 40, 26, 60, 32,4,true );
					var outerMaterial = new THREE.MeshBasicMaterial( {color: 0xffff00} );
					 outerCylinderMesh = new THREE.Mesh( outerCylinderGeometry, material );
					//outerMaterial.side = THREE.DoubleSide;
					outerCylinderMesh.position.set( 0, 0, 0 );
					scene.add( outerCylinderMesh );
					//alert('cylinder');
					var innerCylinderGeometry = new THREE.CylinderGeometry( 39, 25, 60, 32,4,true );
					var innerMaterial = new THREE.MeshBasicMaterial( {color: 0xffffff} );
					innerCylinderMesh = new THREE.Mesh( innerCylinderGeometry, innerMaterial );
					innerMaterial.side = THREE.DoubleSide;
					scene.add( innerCylinderMesh );
					//alert(innerCylinderMesh);
					var cylinderBaseMaterial = new THREE.MeshBasicMaterial({color: 0xffffff});
					var cylinderBaseGeometry = new THREE.CircleGeometry( 25, 32 );				
					var cylinderBaseMesh = new THREE.Mesh( cylinderBaseGeometry, cylinderBaseMaterial );
					cylinderBaseMesh.position.y = -30;
					cylinderBaseMesh.rotation.x += Math.PI/2;
					cylinderBaseMaterial.side = THREE.DoubleSide;
					scene.add( cylinderBaseMesh );

					
					camera.position.z = 150;
					
					
					var mouseX = 0, mouseY = 0;
					var windowHalfX = window.innerWidth / 2;
					var windowHalfY = window.innerHeight / 2;
                       
render();

}
    
function render() {
						// alert('render');
    requestAnimationFrame( render );							
    outerCylinderMesh.rotation.y -= 0.02;
    innerCylinderMesh.rotation.y -= 0.02;
    controls.update();
    renderer.render( scene, camera );
}