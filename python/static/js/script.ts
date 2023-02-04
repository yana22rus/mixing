function edit(id) {
    document.querySelector(`#${id}`).setAttribute("hidden", "hidden")
    document.querySelector(`.${id}`).removeAttribute('hidden');
}
111222