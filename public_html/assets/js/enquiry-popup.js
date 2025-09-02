function openEnquiryModal(buttonEl) {
    const modal = document.getElementById("enquiryModal");
    const heading = document.getElementById("enquiryHeading");
    const subHeading = document.getElementById("enquirySubHeading");

    // ---- Read data-* attributes from clicked button ----
    if (buttonEl?.dataset.heading) {
        heading.textContent = buttonEl.dataset.heading;
    } else {
        heading.textContent = "Talk to a learning expert";
    }

    if (buttonEl?.dataset.subHeading) {
        subHeading.textContent = buttonEl.dataset.subHeading;
    } else {
        subHeading.textContent =
            "Tell us a bit about your needs. We will get back within one business day. Not sure where to begin? Tell us your goal and we will design a bespoke learning plan.";
    }

    // Hidden fields
    document.getElementById("metaCourse").value = buttonEl?.dataset.course || "";
    document.getElementById("metaCourseId").value = buttonEl?.dataset.courseId || "";
    document.getElementById("metaTopic").value = buttonEl?.dataset.topic || "";
    document.getElementById("metaTopicId").value = buttonEl?.dataset.topicId || "";
    document.getElementById("metaCategory").value = buttonEl?.dataset.category || "";
    document.getElementById("metaCategoryId").value = buttonEl?.dataset.categoryId || "";
    document.getElementById("metaUrl").value = buttonEl?.dataset.url || "";
    document.getElementById("metaDeliveryMethod").value = buttonEl?.dataset.deliveryMethod || "";

    // ---- Show modal ----
    modal.classList.remove("enquiry-hidden");
    void modal.offsetWidth; // force reflow
    modal.classList.add("show");
    document.body.style.overflow = "hidden"; // prevent background scroll
}

function closeEnquiryModal() {
    const modal = document.getElementById("enquiryModal");
    modal.classList.remove("show");
    setTimeout(() => modal.classList.add("enquiry-hidden"), 300);
    document.body.style.overflow = ""; // restore scroll
}

function closeEnquiryModal() {
    const modal = document.getElementById("enquiryModal");
    modal.classList.remove("show");
    setTimeout(() => modal.classList.add("enquiry-hidden"), 300);
    document.body.style.overflow = ""; // restore scroll
}

/* ---- Dynamic funding help copy ---- */
(function () {
    const help = document.getElementById("fundingHelp");
    if (!help) return;
    function update() {
        const val = (document.querySelector('input[name="funding"]:checked') || {}).value;
        if (val === "employer") {
            help.innerHTML = 'We work with HR/L&amp;D teams globally. Need a <strong>formal quote</strong>, <strong>PO/invoice</strong>, or <strong>multi-seat discount</strong>? We will sort it.';
        } else if (val === "self") {
            help.innerHTML = 'Investing personally? Ask about <strong>installment plans</strong> and <strong>bursaries/scholarships</strong> for selected courses.';
        } else {
            help.innerHTML = 'Not sure yet? No problem – we will help you compare options and unlock employer budgets.';
        }
    }
    document.querySelectorAll('input[name="funding"]').forEach(r => r.addEventListener('change', update));
    update();
})();

/* ---- Country -> dial code placeholder hint ---- */
(function () {
    const dialMap = { GB: '+44', US: '+1', IN: '+91', AE: '+971', AU: '+61', CA: '+1', SG: '+65' };
    const country = document.getElementById('country');
    const phone = document.getElementById('phone');
    if (!country || !phone) return;
    function setDial() {
        const code = dialMap[country.value] || '+';
        if (!phone.value || phone.value.trim() === '' || phone.value.startsWith('+')) {
            phone.placeholder = 'e.g., ' + code + ' 7123 456789';
        }
    }
    country.addEventListener('change', setDial);
    setDial();
})();
