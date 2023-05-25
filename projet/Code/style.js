gsap.to(".box", { x: 200, duration: 2})
// gsap.registerPlugin(ScrollTrigger);
// gsap.from(".card-animate", {
//     ScrollTrigger:{
//         trigger:".card-animate",
//         toggleActions:"restart none none none",
//     },
//     duration: 4,
//     scale: 0.5, 
//     opacity: 0, 
//     delay: 1, 
//     stagger: 0.2,
//     ease: "elastic", 
//     force3D: true
//   });
// gsap.registerPlugin(ScrollTrigger);

// // You can use a ScrollTrigger in a tween or timeline
// gsap.to(".b", {
//   x: 400,
//   rotation: 360,
//   scrollTrigger: {
//     trigger: ".b",
//     start: "top center",
//     end: "top 100px",
//     scrub: true,
//     markers: true,
//     id: "scrub"
//   }
// });