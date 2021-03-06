<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Instances page renderable.
 *
 * @package    tool_moodlenet
 * @copyright  2020 Mathew May {@link https://mathew.solutions}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace tool_moodlenet\output;

defined('MOODLE_INTERNAL') || die;

/**
 * Instances page renderable.
 *
 * @package    tool_moodlenet
 * @copyright  2020 Mathew May {@link https://mathew.solutions}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class instances_page implements \renderable, \templatable {

    /**
     * The link for the default moodlenet site
     *
     * @var string
     */
    private $defaultlink;
    /**
     * The course we are adding to
     *
     * @var string
     */
    private $course;
    /**
     * The section in the course we are adding to
     *
     * @var string
     */
    private $section;

    /**
     * instances_page constructor.
     *
     * @param string $defaultlink The default link for the main moodlenet site
     * @param int $course the course id
     * @param int $section the section id
     */
    public function __construct(string $defaultlink, int $course, int $section) {
        $this->defaultlink = $defaultlink;
        $this->course = $course;
        $this->section = $section;
    }

    /**
     * Export the data.
     *
     * @param \renderer_base $output
     * @return \stdClass
     */
    public function export_for_template(\renderer_base $output): \stdClass {

        // Prepare the context object.
        $data = new \stdClass();
        $data->sesskey = sesskey();
        $data->img = $output->image_url('MoodleNet', 'tool_moodlenet')->out(false);
        $data->mnetlink = $this->defaultlink;
        $data->course = $this->course;
        $data->section = $this->section;
        $data->buttonName = get_config('tool_moodlenet', 'defaultmoodlenetname');

        return $data;
    }
}
