function check_input() {
    if (!document.board_form.title.value) {
        alert("제목을 입력하세요!");
        document.board_form.title.focus();
        return;
    }
    if (!document.board_form.text.value) {
        alert("내용을 입력하세요!");
        document.board_form.text.focus();
        return;
    }
    document.board_form.submit();
}