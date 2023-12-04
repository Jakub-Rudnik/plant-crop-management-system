<?php
function createModal($title, $body) {
    return "
        <div class='modal__background'></div>
        <div class='modal'>
            <div class='modal__header'>
                <h3 class='modal__title'>$title</h3>
                <button class='btn btn__icon' title='Zamknij okno' onclick='closeModal()'>
                    <svg xmlns='http://www.w3.org/2000/svg' fill='var(--text-800)' viewBox='0 0 24 24' stroke-width='1.5' stroke='var(--text-800)' width='24' height='24'>
                        <path stroke-linecap='round' stroke-linejoin='round' d='M6 18L18 6M6 6l12 12' />
                    </svg>
                </button>
            </div>
            <div class='modal__body'>{$body}</div>
        </div>
    ";
}