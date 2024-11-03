import os
import random

# List of Laravel-related commit messages
commit_messages = [
    "Add new route",
    "Refactor controller logic",
    "Create new migration",
    "Add validation rules",
    "Fix route middleware",
    "Optimize query in controller",
    "Refactor service layer",
    "Add new Eloquent model",
    "Update Blade template",
    "Improve seeding script",
    "Update .env example",
    "Fix CSRF token issue",
    "Add unit tests for model",
    "Implement authorization policy",
    "Fix pagination in controller",
]

# Path to a common Laravel file (e.g., routes/web.php)
laravel_file = "routes/web.php"

def make_commit(days: int):
    if days < 1:
        return os.system("git push origin main")
    else:
        # Randomly select a number of commits for each day (between 1 and 3)
        num_commits = random.randint(1, 3)
        dates = f"{days} days ago"

        for _ in range(num_commits):
            # Modify the Laravel file by appending a comment to simulate a change
            with open(laravel_file, "a") as file:
                file.write(f"// Commit made {dates}\n")

            os.system("git add " + laravel_file)

            # Select a random Laravel-related commit message
            message = random.choice(commit_messages)
            os.system(f'git commit --date="{dates}" -m "{message}"')

        return make_commit(days - 1)

if __name__ == "__main__":
    # Ensure the Laravel file exists before starting
    if not os.path.exists(laravel_file):
        os.makedirs("routes", exist_ok=True)
        with open(laravel_file, "w") as file:
            file.write("<?php\n\n// Laravel Routes\n\n")

    make_commit(365)
