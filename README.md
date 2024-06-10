import os
import subprocess

# Налаштування
repo_url = "https://github.com/username/repository.git"
commit_message = "Initial commit"

# Створення файлу .gitignore
gitignore_content = """venv/
__pycache__/
*.pyc
instance/
.env
"""

with open(".gitignore", "w") as f:
    f.write(gitignore_content)

# Створення файлу README.md
readme_content = """# Сайт подорожей по Україні

## Встановлення

1. Клонуйте репозиторій:
   
    ```bash
    git clone https://github.com/username/repository.git
    cd repository
    ```

2. Створіть та активуйте віртуальне середовище:

    ```bash
    python -m venv venv
    source venv/bin/activate  # на Windows використовуйте команду `venv\\Scripts\\activate`
    ```

3. Встановіть залежності:

    ```bash
    pip install -r requirements.txt
    ```

4. Ініціалізуйте базу даних:

    ```bash
    python
    ```

    У інтерактивній консолі Python виконайте:

    ```python
    from app import db, create_app
    app = create_app()
    with app.app_context():
        db.create_all()
    exit()
    ```

5. Запустіть сервер:

    ```bash
    flask run
    ```

Після цього проект буде доступний за адресою `http://127.0.0.1:5000/`.
"""

with open("README.md", "w") as f:
    f.write(readme_content)

# Ініціалізація репозиторію та перший коміт
subprocess.run(["git", "init"])
subprocess.run(["git", "add", "."])
subprocess.run(["git", "commit", "-m", commit_message])
subprocess.run(["git", "remote", "add", "origin", repo_url])
subprocess.run(["git", "push", "-u", "origin", "master"])

print("Проект успішно завантажено на GitHub")
