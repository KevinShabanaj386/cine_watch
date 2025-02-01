document.addEventListener("DOMContentLoaded", function () {
    const faqItems = document.querySelectorAll(".faq-item");

    faqItems.forEach(item => {
        const question = item.querySelector(".faq-question");
        const answer = item.querySelector(".faq-answer");
        const toggleBtn = item.querySelector(".toggle-btn");

        question.addEventListener("click", () => {
            // Hide all other answers
            faqItems.forEach(otherItem => {
                if (otherItem !== item) {
                    otherItem.querySelector(".faq-answer").classList.add("hidden");
                    otherItem.querySelector(".toggle-btn").textContent = "+";
                }
            });

            // Toggle the clicked answer
            answer.classList.toggle("hidden");

            // Change + to - and vice versa
            toggleBtn.textContent = answer.classList.contains("hidden") ? "+" : "-";
        });
    });
});
