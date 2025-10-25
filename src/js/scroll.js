import Lenis from 'lenis'
import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

const lenis = new Lenis({
	anchors: true,
});

lenis.on('scroll', ScrollTrigger.update);

gsap.ticker.add((time) => {
  lenis.raf(time * 1000);
});

gsap.ticker.lagSmoothing(0);

let oldScrollY = window.scrollY;

window.onscroll = function () {
   if (oldScrollY < window.scrollY) {
      document.body.setAttribute('data-direction', 'down');
   } else {
      document.body.setAttribute('data-direction', 'up');
   }
   if (window.scrollY > 2000) {
      document.body.classList.add('min-scroll');
   } else {
      document.body.classList.remove('min-scroll');
   }
   oldScrollY = window.scrollY;
}

export default lenis;
