int main() {
    setuid(0);
    system("/usr/bin/python /orbital-offwebsec-2016/create_user.py");
    return 0;
}
