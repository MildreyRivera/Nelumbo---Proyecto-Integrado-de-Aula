const openModal = document.querySelector('.regis-text');
const modal=    document.querySelector('.modal')
const closemodal=   document.querySelector('modal-close')
const closemodal2=   document.querySelector('modal-close2')

openModal.addEventListener('click',(e)=>{
    e.preventDefault(); 
    modal.classList.add('modal--show');
});

closemodal.addEventListener('click',(e)=>{
    e.preventDefault(); 
    modal.classList.remove('modal--show');
});

closemodal2.addEventListener('click',(e)=>{
    e.preventDefault(); 
    modal.classList.remove('modal--show');
});