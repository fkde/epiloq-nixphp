class Modal {

    container = null;

    constructor(selector) {
        this.container = document.querySelector(selector);
        this.setCloseButton(this.container.querySelector('.btn-close'));

        if (document.querySelector('.modal-layer') === null) {
            const layer = (new DOMParser()).parseFromString('<div class="modal-layer hidden"></div>', 'text/html').body.firstChild;
            document.body.appendChild(layer);
            this.layer = document.querySelector('.modal-layer');
        }

        if (this.container.querySelector('.error')) {
            this.open();
        }

        this.layer.addEventListener('click', () => {
            this.close();
        });
    }

    open() {
        this.container.classList.remove('hidden');
        this.layer.classList.remove('hidden');
    }

    close() {
        this.container.classList.add('hidden');
        this.layer.classList.add('hidden');
    }

    toggle(target) {
        target.classList.toggle('hidden');
    }

    setTrigger(trigger) {
        trigger.addEventListener('click', () => {
            this.open();
        });
    }

    setCloseButton(button) {
        button.addEventListener('click', () => {
            this.close();
        });
    }

}

document.querySelectorAll('.modal-trigger').forEach(trigger => {
    const modal = new Modal(trigger.dataset.target);
    modal.setTrigger(trigger);
});