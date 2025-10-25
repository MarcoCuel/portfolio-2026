export default function grid() {
   document.addEventListener('keydown', (e) => {
      if (e.key.toLowerCase() === 'g' && e.shiftKey) {
         const grid = document.querySelector('.site__grid');
         if (grid) {
            grid.classList.toggle('active');
         }
      }
   });
}