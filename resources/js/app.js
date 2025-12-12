import './bootstrap';

import Alpine from 'alpinejs';
import 'flowbite';
import mask from '@alpinejs/mask';
Alpine.plugin(mask);
window.Alpine = Alpine;
Alpine.start();

const selectElements = document.querySelectorAll('.status-form #status_id');
// console.log(selectElements);
for( let elem of selectElements){
    if(elem.value == 1){
        elem.addEventListener('change', function(){
                this.form.submit();
            });
        }
        else{
            console.log('не успешно');
        }
}
