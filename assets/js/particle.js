// NOTE: The original code loaded the particles.js library and had a
// styled #particles-js div, but never actually called particlesJS()
// to initialize it - so the background wasn't rendering anything.
// This is a default config added to make it functional. Adjust
// colors/counts freely, or remove this file if you don't want it.

particlesJS("particles-js", {
    particles: {
        number: {
            value: 60,
            density: {
                enable: true,
                value_area: 800
            }
        },
        color: {
            value: "#38bdf8"
        },
        shape: {
            type: "circle"
        },
        opacity: {
            value: 0.4,
            random: true
        },
        size: {
            value: 3,
            random: true
        },
        line_linked: {
            enable: true,
            distance: 150,
            color: "#38bdf8",
            opacity: 0.2,
            width: 1
        },
        move: {
            enable: true,
            speed: 1.2,
            direction: "none",
            random: true,
            straight: false,
            out_mode: "out"
        }
    },
    interactivity: {
        detect_on: "canvas",
        events: {
            onhover: {
                enable: true,
                mode: "grab"
            },
            onclick: {
                enable: false
            },
            resize: true
        },
        modes: {
            grab: {
                distance: 140,
                line_linked: {
                    opacity: 0.5
                }
            }
        }
    },
    retina_detect: true
});
