
function toggleVisibility(section) {
    const surveySection = document.getElementById('survey');
    const contactSection = document.getElementById('contact');

    
    surveySection.classList.add('hidden');
    contactSection.classList.add('hidden');

    
    if (section === 'support') {
        surveySection.classList.remove('hidden');
    } else if (section === 'contact') {
        contactSection.classList.remove('hidden');
    }
}
