<?php
/**
 * Class PHP52to53_Sniffs_Extensions_NcursesSniff.
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   PHP_CodeSniffer
 * @author    René Oelke <rene.oelke@foobugs.com>
 * @copyright 2012 Foobugs
 * @license   BSD Licence
 * @version   $Id$
 * @link      http://pear.php.net/package/PHP_CodeSniffer
 */

/**
 * This sniff searches for constants and functions of the ncurses extension.
 *
 * The ncurses extension isn't a standard extension anymore. It's moved to PECL. For all ncurses
 * constants and functions see http://php.net/manual/en/book.ncurses.php.
 *
 * @category  PHP
 * @package   PHP_CodeSniffer
 * @author    René Oelke <rene.oelke@foobugs.com>
 * @copyright 2012 Foobugs
 * @license   BSD Licence
 * @version   $Id$
 * @link      http://pear.php.net/package/PHP_CodeSniffer
 */
class PHP52to53_Sniffs_Extensions_NcursesSniff implements PHP_CodeSniffer_Sniff
{
	/**
	 * List with all ncurses constants.
	 *
	 * @var array
	 */
	private $_constants = array(
		'NCURSES_COLOR_BLACK',
		'NCURSES_COLOR_WHITE',
		'NCURSES_COLOR_RED',
		'NCURSES_COLOR_GREEN',
		'NCURSES_COLOR_YELLOW',
		'NCURSES_COLOR_BLUE',
		'NCURSES_COLOR_CYAN',
		'NCURSES_COLOR_MAGENTA',
		'NCURSES_KEY_F0',
		'NCURSES_KEY_F1',
		'NCURSES_KEY_F2',
		'NCURSES_KEY_F3',
		'NCURSES_KEY_F4',
		'NCURSES_KEY_F5',
		'NCURSES_KEY_F6',
		'NCURSES_KEY_F7',
		'NCURSES_KEY_F8',
		'NCURSES_KEY_F9',
		'NCURSES_KEY_F10',
		'NCURSES_KEY_F11',
		'NCURSES_KEY_F12',
		'NCURSES_KEY_F13',
		'NCURSES_KEY_F14',
		'NCURSES_KEY_F15',
		'NCURSES_KEY_F16',
		'NCURSES_KEY_F17',
		'NCURSES_KEY_F18',
		'NCURSES_KEY_F19',
		'NCURSES_KEY_F20',
		'NCURSES_KEY_F21',
		'NCURSES_KEY_F22',
		'NCURSES_KEY_F23',
		'NCURSES_KEY_F24',
		'NCURSES_KEY_F25',
		'NCURSES_KEY_F26',
		'NCURSES_KEY_F27',
		'NCURSES_KEY_F28',
		'NCURSES_KEY_F29',
		'NCURSES_KEY_F30',
		'NCURSES_KEY_F31',
		'NCURSES_KEY_F32',
		'NCURSES_KEY_F33',
		'NCURSES_KEY_F34',
		'NCURSES_KEY_F35',
		'NCURSES_KEY_F36',
		'NCURSES_KEY_F37',
		'NCURSES_KEY_F38',
		'NCURSES_KEY_F39',
		'NCURSES_KEY_F40',
		'NCURSES_KEY_F41',
		'NCURSES_KEY_F42',
		'NCURSES_KEY_F43',
		'NCURSES_KEY_F44',
		'NCURSES_KEY_F45',
		'NCURSES_KEY_F46',
		'NCURSES_KEY_F47',
		'NCURSES_KEY_F48',
		'NCURSES_KEY_F49',
		'NCURSES_KEY_F50',
		'NCURSES_KEY_F51',
		'NCURSES_KEY_F52',
		'NCURSES_KEY_F53',
		'NCURSES_KEY_F54',
		'NCURSES_KEY_F55',
		'NCURSES_KEY_F56',
		'NCURSES_KEY_F57',
		'NCURSES_KEY_F58',
		'NCURSES_KEY_F59',
		'NCURSES_KEY_F60',
		'NCURSES_KEY_F61',
		'NCURSES_KEY_F62',
		'NCURSES_KEY_F63',
		'NCURSES_KEY_F64',
		'NCURSES_KEY_DOWN',
		'NCURSES_KEY_UP',
		'NCURSES_KEY_LEFT',
		'NCURSES_KEY_RIGHT',
		'NCURSES_KEY_HOME',
		'NCURSES_KEY_BACKSPACE',
		'NCURSES_KEY_DL',
		'NCURSES_KEY_IL',
		'NCURSES_KEY_DC',
		'NCURSES_KEY_IC',
		'NCURSES_KEY_EIC',
		'NCURSES_KEY_CLEAR',
		'NCURSES_KEY_EOS',
		'NCURSES_KEY_EOL',
		'NCURSES_KEY_SF',
		'NCURSES_KEY_SR',
		'NCURSES_KEY_NPAGE',
		'NCURSES_KEY_PPAGE',
		'NCURSES_KEY_STAB',
		'NCURSES_KEY_CTAB',
		'NCURSES_KEY_CATAB',
		'NCURSES_KEY_SRESET',
		'NCURSES_KEY_RESET',
		'NCURSES_KEY_PRINT',
		'NCURSES_KEY_LL',
		'NCURSES_KEY_A1',
		'NCURSES_KEY_A3',
		'NCURSES_KEY_B2',
		'NCURSES_KEY_C1',
		'NCURSES_KEY_C3',
		'NCURSES_KEY_BTAB',
		'NCURSES_KEY_BEG',
		'NCURSES_KEY_CANCEL',
		'NCURSES_KEY_CLOSE',
		'NCURSES_KEY_COMMAND',
		'NCURSES_KEY_COPY',
		'NCURSES_KEY_CREATE',
		'NCURSES_KEY_END',
		'NCURSES_KEY_EXIT',
		'NCURSES_KEY_FIND',
		'NCURSES_KEY_HELP',
		'NCURSES_KEY_MARK',
		'NCURSES_KEY_MESSAGE',
		'NCURSES_KEY_MOVE',
		'NCURSES_KEY_NEXT',
		'NCURSES_KEY_OPEN',
		'NCURSES_KEY_OPTIONS',
		'NCURSES_KEY_PREVIOUS',
		'NCURSES_KEY_REDO',
		'NCURSES_KEY_REFERENCE',
		'NCURSES_KEY_REFRESH',
		'NCURSES_KEY_REPLACE',
		'NCURSES_KEY_RESTART',
		'NCURSES_KEY_RESUME',
		'NCURSES_KEY_SAVE',
		'NCURSES_KEY_SBEG',
		'NCURSES_KEY_SCANCEL',
		'NCURSES_KEY_SCOMMAND',
		'NCURSES_KEY_SCOPY',
		'NCURSES_KEY_SCREATE',
		'NCURSES_KEY_SDC',
		'NCURSES_KEY_SDL',
		'NCURSES_KEY_SELECT',
		'NCURSES_KEY_SEND',
		'NCURSES_KEY_SEOL',
		'NCURSES_KEY_SEXIT',
		'NCURSES_KEY_SFIND',
		'NCURSES_KEY_SHELP',
		'NCURSES_KEY_SHOME',
		'NCURSES_KEY_SIC',
		'NCURSES_KEY_SLEFT',
		'NCURSES_KEY_SMESSAGE',
		'NCURSES_KEY_SMOVE',
		'NCURSES_KEY_SNEXT',
		'NCURSES_KEY_SOPTIONS',
		'NCURSES_KEY_SPREVIOUS',
		'NCURSES_KEY_SPRINT',
		'NCURSES_KEY_SREDO',
		'NCURSES_KEY_SREPLACE',
		'NCURSES_KEY_SRIGHT',
		'NCURSES_KEY_SRSUME',
		'NCURSES_KEY_SSAVE',
		'NCURSES_KEY_SSUSPEND',
		'NCURSES_KEY_UNDO',
		'NCURSES_KEY_MOUSE',
		'NCURSES_KEY_MAX',
		'NCURSES_BUTTON1_RELEASED',
		'NCURSES_BUTTON2_RELEASED',
		'NCURSES_BUTTON3_RELEASED',
		'NCURSES_BUTTON4_RELEASED',
		'NCURSES_BUTTON1_PRESSED',
		'NCURSES_BUTTON2_PRESSED',
		'NCURSES_BUTTON3_PRESSED',
		'NCURSES_BUTTON4_PRESSED',
		'NCURSES_BUTTON1_CLICKED',
		'NCURSES_BUTTON2_CLICKED',
		'NCURSES_BUTTON3_CLICKED',
		'NCURSES_BUTTON4_CLICKED',
		'NCURSES_BUTTON1_DOUBLE_CLICKED',
		'NCURSES_BUTTON2_DOUBLE_CLICKED',
		'NCURSES_BUTTON3_DOUBLE_CLICKED',
		'NCURSES_BUTTON4_DOUBLE_CLICKED',
		'NCURSES_BUTTON1_TRIPLE_CLICKED',
		'NCURSES_BUTTON2_TRIPLE_CLICKED',
		'NCURSES_BUTTON3_TRIPLE_CLICKED',
		'NCURSES_BUTTON4_TRIPLE_CLICKED',
		'NCURSES_BUTTON_CTRL',
		'NCURSES_BUTTON_SHIFT',
		'NCURSES_BUTTON_ALT',
		'NCURSES_ALL_MOUSE_EVENTS',
		'NCURSES_REPORT_MOUSE_POSITION',
	);

	/**
	 * List with all ncurses functions.
	 *
	 * @var array
	 */
	private $_functions = array(
		'ncurses_addch',
		'ncurses_addchnstr',
		'ncurses_addchstr',
		'ncurses_addnstr',
		'ncurses_addstr',
		'ncurses_assume_default_colors',
		'ncurses_attroff',
		'ncurses_attron',
		'ncurses_attrset',
		'ncurses_baudrate',
		'ncurses_beep',
		'ncurses_bkgd',
		'ncurses_bkgdset',
		'ncurses_border',
		'ncurses_bottom_panel',
		'ncurses_can_change_color',
		'ncurses_cbreak',
		'ncurses_clear',
		'ncurses_clrtobot',
		'ncurses_clrtoeol',
		'ncurses_color_content',
		'ncurses_color_set',
		'ncurses_curs_set',
		'ncurses_def_prog_mode',
		'ncurses_def_shell_mode',
		'ncurses_define_key',
		'ncurses_del_panel',
		'ncurses_delay_output',
		'ncurses_delch',
		'ncurses_deleteln',
		'ncurses_delwin',
		'ncurses_doupdate',
		'ncurses_echo',
		'ncurses_echochar',
		'ncurses_end',
		'ncurses_erase',
		'ncurses_erasechar',
		'ncurses_filter',
		'ncurses_flash',
		'ncurses_flushinp',
		'ncurses_getch',
		'ncurses_getmaxyx',
		'ncurses_getmouse',
		'ncurses_getyx',
		'ncurses_halfdelay',
		'ncurses_has_colors',
		'ncurses_has_ic',
		'ncurses_has_il',
		'ncurses_has_key',
		'ncurses_hide_panel',
		'ncurses_hline',
		'ncurses_inch',
		'ncurses_init_color',
		'ncurses_init_pair',
		'ncurses_init',
		'ncurses_insch',
		'ncurses_insdelln',
		'ncurses_insertln',
		'ncurses_insstr',
		'ncurses_instr',
		'ncurses_isendwin',
		'ncurses_keyok',
		'ncurses_keypad',
		'ncurses_killchar',
		'ncurses_longname',
		'ncurses_meta',
		'ncurses_mouse_trafo',
		'ncurses_mouseinterval',
		'ncurses_mousemask',
		'ncurses_move_panel',
		'ncurses_move',
		'ncurses_mvaddch',
		'ncurses_mvaddchnstr',
		'ncurses_mvaddchstr',
		'ncurses_mvaddnstr',
		'ncurses_mvaddstr',
		'ncurses_mvcur',
		'ncurses_mvdelch',
		'ncurses_mvgetch',
		'ncurses_mvhline',
		'ncurses_mvinch',
		'ncurses_mvvline',
		'ncurses_mvwaddstr',
		'ncurses_napms',
		'ncurses_new_panel',
		'ncurses_newpad',
		'ncurses_newwin',
		'ncurses_nl',
		'ncurses_nocbreak',
		'ncurses_noecho',
		'ncurses_nonl',
		'ncurses_noqiflush',
		'ncurses_noraw',
		'ncurses_pair_content',
		'ncurses_panel_above',
		'ncurses_panel_below',
		'ncurses_panel_window',
		'ncurses_pnoutrefresh',
		'ncurses_prefresh',
		'ncurses_putp',
		'ncurses_qiflush',
		'ncurses_raw',
		'ncurses_refresh',
		'ncurses_replace_panel',
		'ncurses_reset_prog_mode',
		'ncurses_reset_shell_mode',
		'ncurses_resetty',
		'ncurses_savetty',
		'ncurses_scr_dump',
		'ncurses_scr_init',
		'ncurses_scr_restore',
		'ncurses_scr_set',
		'ncurses_scrl',
		'ncurses_show_panel',
		'ncurses_slk_attr',
		'ncurses_slk_attroff',
		'ncurses_slk_attron',
		'ncurses_slk_attrset',
		'ncurses_slk_clear',
		'ncurses_slk_color',
		'ncurses_slk_init',
		'ncurses_slk_noutrefresh',
		'ncurses_slk_refresh',
		'ncurses_slk_restore',
		'ncurses_slk_set',
		'ncurses_slk_touch',
		'ncurses_standend',
		'ncurses_standout',
		'ncurses_start_color',
		'ncurses_termattrs',
		'ncurses_termname',
		'ncurses_timeout',
		'ncurses_top_panel',
		'ncurses_typeahead',
		'ncurses_ungetch',
		'ncurses_ungetmouse',
		'ncurses_update_panels',
		'ncurses_use_default_colors',
		'ncurses_use_env',
		'ncurses_use_extended_names',
		'ncurses_vidattr',
		'ncurses_vline',
		'ncurses_waddch',
		'ncurses_waddstr',
		'ncurses_wattroff',
		'ncurses_wattron',
		'ncurses_wattrset',
		'ncurses_wborder',
		'ncurses_wclear',
		'ncurses_wcolor_set',
		'ncurses_werase',
		'ncurses_wgetch',
		'ncurses_whline',
		'ncurses_wmouse_trafo',
		'ncurses_wmove',
		'ncurses_wnoutrefresh',
		'ncurses_wrefresh',
		'ncurses_wstandend',
		'ncurses_wstandout',
		'ncurses_wvline',
	);

	/**
	 * A list of tokenizers this sniff supports.
	 *
	 * @var array
	 */
	public $supportedTokenizers = array(
		'PHP',
	);

	/**
	 * Returns the token types that this sniff is interested in.
	 *
	 * @return array(int)
	 * @see PHP_CodeSniffer_Sniff::register()
	 */
	public function register()
	{
		return array(
			T_STRING,
		);
	}

	/**
	 * Processes the tokens that this sniff is interested in.
	 *
	 * @param PHP_CodeSniffer_File $phpcsFile The file where the token was found.
	 * @param int                  $stackPtr  The position in the stack where
	 *                                        the token was found.
	 *
	 * @return void
	 * @see PHP_CodeSniffer_Sniff::process()
	 */
	public function process(PHP_CodeSniffer_File $phpcsFile, $stackPtr)
	{
		$tokens = $phpcsFile->getTokens();
		$token = $tokens[$stackPtr]['content'];

		if (true === in_array($token, $this->_constants)) {
			$error = sprintf(
				'Use of ncurses extension constant "%s"! Extension moved to PECL.',
				$token
			);
			$phpcsFile->addError($error, $stackPtr);
		}

		if (true === in_array($token, $this->_functions)) {
			$error = sprintf(
				'Use of ncurses extension function "%s"! Extension moved to PECL.',
				$token
			);
			$phpcsFile->addError($error, $stackPtr);
		}
	}
}
