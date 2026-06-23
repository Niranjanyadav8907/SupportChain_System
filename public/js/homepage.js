document.addEventListener('DOMContentLoaded', () => {
    // 1. Navbar Scroll State
    const navbar = document.querySelector('.navbar-custom');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 40) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });

    // 2. Scroll-Triggered Animations (Intersection Observer)
    const fadeElements = document.querySelectorAll('.fade-in-up-trigger');
    const animationObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.08,
        rootMargin: '0px 0px -40px 0px'
    });

    fadeElements.forEach(el => {
        animationObserver.observe(el);
    });

    // 3. Stats Counter Animation
    const statsSection = document.querySelector('.stats-section-container');
    const statNumbers = document.querySelectorAll('.stat-num-val');
    let animated = false;

    const countUp = (element) => {
        const target = parseFloat(element.getAttribute('data-target'));
        const isFloat = element.getAttribute('data-float') === 'true';
        const suffix = element.getAttribute('data-suffix') || '';
        const duration = 1800; // ms
        const startTime = performance.now();

        const updateCount = (currentTime) => {
            const elapsedTime = currentTime - startTime;
            const progress = Math.min(elapsedTime / duration, 1);
            
            // Ease out quad progress
            const easeProgress = progress * (2 - progress);
            const currentVal = easeProgress * target;

            if (isFloat) {
                element.textContent = currentVal.toFixed(1) + suffix;
            } else {
                element.textContent = Math.floor(currentVal).toLocaleString() + suffix;
            }

            if (progress < 1) {
                requestAnimationFrame(updateCount);
            } else {
                if (isFloat) {
                    element.textContent = target.toFixed(1) + suffix;
                } else {
                    element.textContent = target.toLocaleString() + suffix;
                }
            }
        };

        requestAnimationFrame(updateCount);
    };

    const statsObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting && !animated) {
                statNumbers.forEach(num => countUp(num));
                animated = true;
                statsObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.2 });

    if (statsSection) {
        statsObserver.observe(statsSection);
    }

    // 4. Interactive Internal Workflow Escalation Cycle (Employee -> Team Lead -> Project Manager -> HR/Admin)
    const workflowNodes = document.querySelectorAll('.workflow-node-item');
    let currentWorkflowIndex = 0;
    let workflowTimer;

    const highlightWorkflowStep = (index) => {
        workflowNodes.forEach((node, idx) => {
            if (idx === index) {
                node.classList.add('workflow-active');
            } else {
                node.classList.remove('workflow-active');
            }
        });
    };

    const cycleWorkflowSteps = () => {
        workflowTimer = setInterval(() => {
            currentWorkflowIndex = (currentWorkflowIndex + 1) % workflowNodes.length;
            highlightWorkflowStep(currentWorkflowIndex);
        }, 3000);
    };

    if (workflowNodes.length > 0) {
        highlightWorkflowStep(0);
        cycleWorkflowSteps();

        // Node hover interactivity
        workflowNodes.forEach((node, idx) => {
            node.addEventListener('mouseenter', () => {
                clearInterval(workflowTimer);
                highlightWorkflowStep(idx);
            });

            node.addEventListener('mouseleave', () => {
                currentWorkflowIndex = idx;
                cycleWorkflowSteps();
            });

            node.addEventListener('click', () => {
                clearInterval(workflowTimer);
                highlightWorkflowStep(idx);
            });
        });
    }

    // 5. Contact Form Handler (Simulated Submit Action)
    const contactForm = document.getElementById('corporateSupportContactForm');
    const formSuccessAlert = document.getElementById('formSuccessAlert');

    if (contactForm) {
        contactForm.addEventListener('submit', (e) => {
            e.preventDefault();

            const name = document.getElementById('employeeName').value;
            const email = document.getElementById('employeeEmail').value;
            const dept = document.getElementById('employeeDept').value;
            const message = document.getElementById('employeeMessage').value;

            if (!name || !email || !dept || !message) {
                return;
            }

            const submitBtn = contactForm.querySelector('button[type="submit"]');
            const originalBtnHtml = submitBtn.innerHTML;

            submitBtn.disabled = true;
            submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span> Submitting Request...';

            setTimeout(() => {
                // Reset form inputs
                contactForm.reset();
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalBtnHtml;

                // Show success banner
                formSuccessAlert.classList.remove('d-none');
                formSuccessAlert.style.opacity = '0';
                formSuccessAlert.style.display = 'block';

                setTimeout(() => {
                    formSuccessAlert.style.transition = 'opacity 0.4s ease';
                    formSuccessAlert.style.opacity = '1';
                }, 50);

                // Hide success banner after 6 seconds
                setTimeout(() => {
                    formSuccessAlert.style.opacity = '0';
                    setTimeout(() => {
                        formSuccessAlert.classList.add('d-none');
                    }, 400);
                }, 6000);

            }, 1200);
        });
    }
});
