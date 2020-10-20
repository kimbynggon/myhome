
    function check_input()
    {
        if (!document.signup.id.value) {
        alert("아이디를 입력하세요!");
        document.signup.id.focus();
        return;
    }

        if (!document.signup.pass.value) {
        alert("비밀번호를 입력하세요!");
        document.signup.pass.focus();
        return;
    }

        if (!document.signup.pass_confirm.value) {
        alert("비밀번호확인을 입력하세요!");
        document.signup.pass_confirm.focus();
        return;
    }

        if (!document.signup.name.value) {
        alert("이름을 입력하세요!");
        document.signup.name.focus();
        return;
    }

        if (!document.signup.email1.value) {
        alert("이메일 주소를 입력하세요!");
        document.signup.email1.focus();
        return;
    }

        if (!document.signup.email2.value) {
        alert("이메일 주소를 입력하세요!");
        document.signup.email2.focus();
        return;
    }

        if (document.signup.pass.value !=
        document.signup.pass_confirm.value) {
        alert("비밀번호가 일치하지 않습니다.\n다시 입력해 주세요!");
        document.signup.pass.focus();
        document.signup.pass.select();
        return;
    }

        document.signup.submit();
    }

    function reset_form() {
    document.signup.id.value = "";
    document.signup.pass.value = "";
    document.signup.pass_confirm.value = "";
    document.signup.name.value = "";
    document.signup.email1.value = "";
    document.signup.email2.value = "";
    document.signup.id.focus();
    return;
}

    function check_id() {
    window.open("member_check_id.php?id=" + document.signup.id.value,
        "IDcheck",
        "left=700,top=300,width=350,height=200,scrollbars=no,resizable=yes");
}
