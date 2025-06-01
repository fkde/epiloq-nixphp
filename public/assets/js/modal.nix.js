const modal = () => {

    return {
        open(target) {
            target.classList.remove('hidden');
        },
        close(target) {
            target.classList.add('hidden');
        },
        toggle(target) {
            target.classList.toggle('hidden');
        },
        setTrigger(trigger) {
            trigger.addEventListener('click', () => {
                this.open(document.querySelector(trigger.dataset.target));
            });
        },
        setCloseButton(button) {
            document.querySelector(button).addEventListener('click', () => {
                this.close();
            });
        }
    }

}

const obj = modal();

document.querySelectorAll('.modal-trigger').forEach(trigger => {
    obj.setTrigger(trigger);
});