
function toggleVisibility(section) {
    const surveySection = document.getElementById('survey');
    const contactSection = document.getElementById('contact');

    // Hide all sections first
    surveySection.classList.add('hidden');
    contactSection.classList.add('hidden');

    // Show the selected section
    if (section === 'support') {
        surveySection.classList.remove('hidden');
    } else if (section === 'contact') {
        contactSection.classList.remove('hidden');
    }
}
