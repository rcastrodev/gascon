$('.toggle').click(function(e){
    e.preventDefault()
    $(this).siblings('ul').toggle();
    let element = e.target.querySelector('i')
    console.log(element);
    if (element.classList.contains('fa-angle-up')) {
        element.classList.remove('fa-angle-up')
        element.classList.add('fa-angle-down')
    }else{
        element.classList.add('fa-angle-up')
        element.classList.remove('fa-angle-down')
    }
})