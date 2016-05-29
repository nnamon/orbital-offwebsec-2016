int main() {
    setuid(0);
    system("/usr/bin/python /orbital-offwebsec-2016/admin/create_user.py");
    return 0;
}
