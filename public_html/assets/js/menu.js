$(document).ready(function () {
    const $mega = $(".horizontal-megamenu");
    const $toggle = $(".mega-menu-trigger > a");
    const $coreList = $(".categories-list ul");
    const $subList = $(".topics-list ul");
    const $coursesGrid = $(".courses-grid");
    const $search = $(".mega-search");

    let catalog = {};        // will hold JSON data
    let currentCore = null;
    let currentSub = null;

    // Render categories
    function renderCores(filter = "") {
        $coreList.empty();
        $.each(catalog, function (core) {
            if (filter && !core.toLowerCase().includes(filter)) return;
            $coreList.append(
                `<li><button class="item-box" data-core="${core}">${core}</button></li>`
            );
        });
    }

    // Render sub-categories
    function renderSubs(core, filter = "") {
        $subList.empty();
        $.each(catalog[core].subs, function (sub, obj) {
            const courses = obj.courses.map(c => c.name);
            if (
                filter &&
                !sub.toLowerCase().includes(filter) &&
                !courses.some((c) => c.toLowerCase().includes(filter))
            )
                return;
            $subList.append(
                `<li><button class="item-box" data-sub="${sub}">${sub}</button></li>`
            );
        });
    }

    // Render courses (normal mode)
    function renderCourses(core, sub, filter = "") {
        $coursesGrid.empty();
        const list = catalog[core].subs[sub].courses || [];
        const filtered = filter
            ? list.filter((c) => c.name.toLowerCase().includes(filter))
            : list;

        $.each(filtered, function (i, c) {
            $coursesGrid.append(
                `<div class="course-card fade-in">
                    <div class="course-title">${c.name}</div>
                    <div class="course-meta">${core} • ${sub}</div>
                </div>`
            );
        });

        if (!filtered.length) {
            $coursesGrid.html(
                `<div style="color:#6b7280;font-size:14px;">No courses found.</div>`
            );
        }
    }

    // Render search results across all catalog
    function renderSearchResults(term) {
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
            $coursesGrid.html(
                `<div style="color:#6b7280;font-size:14px;">No courses found.</div>`
            );
        }
    }

    // Event: select category
    $(document).on("click", "[data-core]", function () {
        $("[data-core]").removeClass("active");
        $(this).addClass("active");
        currentCore = $(this).data("core");
        renderSubs(currentCore, $search.val().toLowerCase());
        $("[data-sub]").first().click();
    });

    // Event: select sub-category
    $(document).on("click", "[data-sub]", function () {
        $("[data-sub]").removeClass("active");
        $(this).addClass("active");
        currentSub = $(this).data("sub");
        renderCourses(currentCore, currentSub, $search.val().toLowerCase());
    });

    // Search filter
    $search.on("input", function () {
        const term = $(this).val().toLowerCase();

        if (term) {
            $(".categories-list, .topics-list").css("opacity", "0.3");
            renderSearchResults(term);
        } else {
            $(".categories-list, .topics-list").css("opacity", "1");
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

    // Close on outside click
    $(document).on("click", function (e) {
        if (!$(e.target).closest(".horizontal-megamenu, .mega-menu-trigger").length) {
            $mega.removeClass("open");
        }
    });

    // ✅ Load JSON file then initialize
    $.getJSON("assets/json/menu.json", function (data) {
        catalog = data;
        renderCores();
        $("[data-core]").first().click();
    });
});
