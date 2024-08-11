const ty = gsap.timeline({ defaults: { ease: "power1.out" } });

ty.fromTo(".register-box", { opacity: 0 }, { opacity: 1, duration: 0.5 });
ty.fromTo(".register-animation-form", { opacity: 0 }, { opacity: 1, duration: 0.5 });