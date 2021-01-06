let link_block = document.querySelectorAll('.link_block');
let block_data = document.querySelectorAll('.block_data');

for (let i = 0; i < link_block.length; i++) {
    link_block[i].addEventListener('click', ToggleDataBlock);
}

function ToggleDataBlock(){
    for (let i = 0; i < link_block.length; i++) {
        link_block[i].classList.remove('active');
    }
    this.classList.toggle('active');
    for (let i = 0; i < block_data.length; i++) {
        block_data[i].classList.add('hide-block');
    }
    for (let i = 0; i < link_block.length; i++) {
        if (link_block[i].classList.contains('active')){
            let part_id = link_block[i].getAttribute('id').split('_')[1];
            document.getElementById('list_' + part_id).classList.remove('hide-block');
        }
    }
}


