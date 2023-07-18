db.createUser({
    user: "mi",
    pwd: "test",
    roles: [
        {
            role: "readWrite",
            db: "mi"
        }
    ]
});
