// three-config.js

const scene = new THREE.Scene();
const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);

const renderer = new THREE.WebGLRenderer({ antialias: true });
renderer.setSize(window.innerWidth, window.innerHeight);
document.getElementById('background').appendChild(renderer.domElement);

const geometry = new THREE.PlaneGeometry(2, 2, 1, 1);
const material = new THREE.ShaderMaterial({
    uniforms: {
        time: { value: 0.0 }
    },
    vertexShader: `
        varying vec2 vUv;
        void main() {
            vUv = uv;
            gl_Position = projectionMatrix * modelViewMatrix * vec4(position, 1.0);
        }
    `,
    fragmentShader: `
        uniform float time;
        varying vec2 vUv;
        void main() {
            vec2 uv = vUv;
            uv.x += sin(time) * 0.1;
            uv.y += cos(time) * 0.1;
            vec3 color = vec3(uv.x, uv.y, 0.5);
            gl_FragColor = vec4(color, 1.0);
        }
    `,
    side: THREE.DoubleSide
});

const plane = new THREE.Mesh(geometry, material);
scene.add(plane);

camera.position.z = 1;

function animate() {
    requestAnimationFrame(animate);
    material.uniforms.time.value += 0.01;
    renderer.render(scene, camera);
}

animate();

window.addEventListener('resize', () => {
    camera.aspect = window.innerWidth / window.innerHeight;
    camera.updateProjectionMatrix();
    renderer.setSize(window.innerWidth, window.innerHeight);
});
