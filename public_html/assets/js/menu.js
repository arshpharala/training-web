$(document).ready(function () {
    const $mega = $(".horizontal-megamenu");
    const $toggle = $(".mega-menu-trigger > a, #horizontal-navtoggle");
    const $coreList = $(".categories-list ul");
    const $subList = $(".topics-list ul");
    const $coursesGrid = $(".courses-grid");
    const $search = $(".mega-search");

    let catalog = {};
    let currentCore = null;
    let currentSub = null;

    function isMobile() {
        return window.innerWidth < 992;
    }

    // Render categories
    function renderCores() {
        $coreList.empty();
        $.each(catalog, function (core) {
            $coreList.append(
                `<li>
                    <button class="item-box" data-core="${core}">${core}</button>
                    <ul class="mobile-sub d-lg-none" style="display:none;"></ul>
                 </li>`
            );
        });
    }

    // Render sub-categories
    function renderSubs(core, $targetUl) {
        $targetUl.empty();
        $.each(catalog[core].subs, function (sub, obj) {
            $targetUl.append(
                `<li>
                    <button class="item-box" data-sub="${sub}">${sub}</button>
                    <ul class="mobile-courses d-lg-none" style="display:none;"></ul>
                 </li>`
            );
        });
    }

    // Desktop courses
    function renderCourses(core, sub) {
        $coursesGrid.empty();
        const list = catalog[core].subs[sub].courses || [];
        $.each(list, function (i, c) {
            $coursesGrid.append(
                `<a href="/courses/${c.slug}" class="course-card fade-in">
                <div class="course-title">${c.name}</div>
                <div class="course-meta">${core} • ${sub}</div>
             </a>`
            );
        });
    }

    // Mobile courses
    function renderCoursesMobile(core, sub, $targetUl) {
        $targetUl.empty();
        const list = catalog[core].subs[sub].courses || [];
        $.each(list, function (i, c) {
            $targetUl.append(
                `<li><a href="/courses/${c.slug}" class="item-box">${c.name}</a></li>`
            );
        });
    }

    // Event: select category
    $(document).on("click mouseover", "[data-core]", function () {
        $("[data-core]").removeClass("active open");
        $(this).addClass("active");
        currentCore = $(this).data("core");

        if (isMobile()) {
            const $subUl = $(this).closest("li").find(".mobile-sub");
            if ($subUl.is(":visible")) {
                $subUl.slideUp();
                $(this).removeClass("open");
            } else {
                $(".mobile-sub, .mobile-courses").slideUp();
                $("[data-core]").removeClass("open");
                renderSubs(currentCore, $subUl);
                $subUl.slideDown();
                $(this).addClass("open");
            }
        } else {
            renderSubs(currentCore, $subList);
            $("[data-sub]").first().click();
        }
    });

    // Event: select sub-category
    $(document).on("click", "[data-sub]", function () {
        $("[data-sub]").removeClass("active open");
        $(this).addClass("active");
        currentSub = $(this).data("sub");

        if (isMobile()) {
            const $courseUl = $(this).closest("li").find(".mobile-courses");
            if ($courseUl.is(":visible")) {
                $courseUl.slideUp();
                $(this).removeClass("open");
            } else {
                $(".mobile-courses").slideUp();
                $("[data-sub]").removeClass("open");
                renderCoursesMobile(currentCore, currentSub, $courseUl);
                $courseUl.slideDown();
                $(this).addClass("open");
            }
        } else {
            renderCourses(currentCore, currentSub);
        }
    });

    // Search (desktop only)
    $search.on("input", function () {
        if (isMobile()) return;
        const term = $(this).val().toLowerCase();
        if (term) {
            $coursesGrid.empty();
            let found = 0;
            $.each(catalog, function (core, obj) {
                $.each(obj.subs, function (sub, subObj) {
                    subObj.courses.forEach(function (c) {
                        if (c.name.toLowerCase().includes(term)) {
                            found++;
                            $coursesGrid.append(
                                `<div class="course-card fade-in">
                                    <div class="course-title">${c.name}</div>
                                    <div class="course-meta">${core} • ${sub}</div>
                                </div>`
                            );
                        }
                    });
                });
            });
            if (!found) {
                $coursesGrid.html(`<div style="color:#6b7280;font-size:14px;">No courses found.</div>`);
            }
        } else {
            renderCores();
            $("[data-core]").first().click();
        }
    });

    // Toggle open/close
    $toggle.on("click", function (e) {
        e.preventDefault();
        $mega.toggleClass("open");
        if ($mega.hasClass("open")) {
            renderCores();
            $("[data-core]").first().click();
        }
    });

    // Close on outside click (desktop only)
    $(document).on("click", function (e) {
        if (!isMobile() && !$(e.target).closest(".horizontal-megamenu, .mega-menu-trigger").length) {
            $mega.removeClass("open");
        }
    });

    // Load JSON
    $.getJSON("/ajax/catalog", function (data) {
        catalog = data;
        renderCores();
        $("[data-core]").first().click();
    });
});
