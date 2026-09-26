/* 
========================================================================
   BOOTSTRAP 5 ADMIN TEMPLATE - SPARK ADMIN
   DASHBOARD CORE JAVASCRIPT MODULE
   Developed with premium UI/UX standards

   Template Name: Spark Admin
   Version: 1.0 
   Author: Spark Admin Team 
   Email: hello.sparkadmin@gmail.com
   URL: https://sparkadmin.web.id
========================================================================
*/

document.addEventListener('DOMContentLoaded', function () {
    // -----------------------------------------------------------------
    // 1. Mobile Sidebar Toggle & Backdrop Overlay
    // -----------------------------------------------------------------
    const sidebar = document.querySelector('.sidebar-wrapper');
    const toggleBtn = document.querySelector('.sidebar-toggle-btn');
    
    // Create and append backdrop overlay for mobile sidebar
    let overlay = document.createElement('div');
    overlay.className = 'sidebar-overlay';
    document.body.appendChild(overlay);

    if (toggleBtn && sidebar) {
        toggleBtn.addEventListener('click', function (e) {
            e.stopPropagation();
            sidebar.classList.toggle('show');
            overlay.classList.toggle('show', sidebar.classList.contains('show'));
        });

        // Close sidebar when clicking on backdrop overlay
        overlay.addEventListener('click', function () {
            sidebar.classList.remove('show');
            overlay.classList.remove('show');
        });
    }

    const incomeSparkEl = document.querySelector('#income-sparkline');
    if (incomeSparkEl) {
        const incomeSpark = new ApexCharts(incomeSparkEl, incomeSparkOptions);
        incomeSpark.render();
    }

    const returnSparkEl = document.querySelector('#return-sparkline');
    if (returnSparkEl) {
        const returnSpark = new ApexCharts(returnSparkEl, returnSparkOptions);
        returnSpark.render();
    }

    // -----------------------------------------------------------------
    // 5. Flatpickr Date Range Picker Initialization
    // -----------------------------------------------------------------
    const datePickerTrigger = document.querySelector('#date-picker-trigger');
    const selectedRangeText = document.querySelector('#selected-date-range');
    
    if (datePickerTrigger && selectedRangeText) {
        flatpickr(datePickerTrigger, {
            mode: 'range',
            dateFormat: 'Y-m-d',
            defaultDate: ['2026-01-12', '2026-01-23'],
            onValueUpdate: function (selectedDates, dateStr, instance) {
                if (selectedDates.length === 2) {
                    const startStr = instance.formatDate(selectedDates[0], 'F j, Y');
                    const endStr = instance.formatDate(selectedDates[1], 'F j, Y');
                    selectedRangeText.textContent = `${startStr} - ${endStr}`;
                } else if (selectedDates.length === 1) {
                    const startStr = instance.formatDate(selectedDates[0], 'F j, Y');
                    selectedRangeText.textContent = startStr;
                }
            }
        });
    }

    // -----------------------------------------------------------------
    // 6. Desktop Sidebar Minimize Interaction
    // -----------------------------------------------------------------
    const desktopToggleBtn = document.querySelector('#desktop-sidebar-toggle');
    if (desktopToggleBtn) {
        desktopToggleBtn.addEventListener('click', function () {
            document.body.classList.toggle('sidebar-minimized');
            
            // Toggle icon direction
            const icon = desktopToggleBtn.querySelector('i');
            if (icon) {
                if (document.body.classList.contains('sidebar-minimized')) {
                    icon.className = 'bi bi-chevron-right';
                } else {
                    icon.className = 'bi bi-chevron-left';
                }
            }
            
            // Trigger a window resize event so that charts (ApexCharts) redraw correctly
            setTimeout(() => {
                window.dispatchEvent(new Event('resize'));
            }, 300);
        });
    }
 });


