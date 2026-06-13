---
name: Qrenda
description: Digital business card SaaS — dark, precise, purple-accented
colors:
  signal-violet: "#8b5cf6"
  signal-violet-hover: "#7c3aed"
  signal-violet-deep: "#6d28d9"
  success-green: "#22c55e"
  dark-bg: "#0a0a0a"
  dark-surface: "#111111"
  dark-card: "#141414"
  dark-card-hover: "#1a1a1a"
  text-white: "#ffffff"
  text-dim: "#a1a1aa"
  text-muted: "#71717a"
  border-default: "#27272a"
  border-subtle: "#1e1e1e"
typography:
  display:
    fontFamily: "Inter, system-ui, -apple-system, sans-serif"
    fontSize: "clamp(2.5rem, 5.5vw, 4rem)"
    fontWeight: 700
    lineHeight: 1.1
    letterSpacing: "-0.03em"
  headline:
    fontFamily: "Inter, system-ui, -apple-system, sans-serif"
    fontSize: "clamp(1.75rem, 3.5vw, 2.5rem)"
    fontWeight: 700
    lineHeight: 1.2
    letterSpacing: "-0.02em"
  title:
    fontFamily: "Inter, system-ui, -apple-system, sans-serif"
    fontSize: "1.125rem"
    fontWeight: 600
    lineHeight: 1.3
    letterSpacing: "normal"
  body:
    fontFamily: "Inter, system-ui, -apple-system, sans-serif"
    fontSize: "0.9375rem"
    fontWeight: 400
    lineHeight: 1.7
    letterSpacing: "normal"
  label:
    fontFamily: "Inter, system-ui, -apple-system, sans-serif"
    fontSize: "0.75rem"
    fontWeight: 600
    lineHeight: 1.3
    letterSpacing: "0.1em"
rounded:
  pill: "9999px"
  md: "12px"
  sm: "8px"
spacing:
  xs: "8px"
  sm: "16px"
  md: "24px"
  lg: "32px"
  xl: "48px"
  xxl: "64px"
components:
  button-primary:
    backgroundColor: "{colors.signal-violet}"
    textColor: "{colors.text-white}"
    rounded: "{rounded.pill}"
    padding: "14px 32px"
    typography: "{typography.label}"
  button-primary-hover:
    backgroundColor: "{colors.signal-violet-hover}"
    textColor: "{colors.text-white}"
    rounded: "{rounded.pill}"
    padding: "14px 32px"
  button-outline:
    backgroundColor: transparent
    textColor: "{colors.text-white}"
    rounded: "{rounded.pill}"
    padding: "14px 32px"
    border: "1px solid {colors.border-default}"
  button-outline-hover:
    backgroundColor: "rgba(255,255,255,0.04)"
    textColor: "{colors.text-white}"
    rounded: "{rounded.pill}"
    padding: "14px 32px"
    border: "1px solid {colors.text-dim}"
  card-default:
    backgroundColor: "{colors.dark-card}"
    textColor: "{colors.text-dim}"
    rounded: "{rounded.md}"
    padding: "{spacing.lg}"
  input-default:
    backgroundColor: "{colors.dark-card}"
    textColor: "{colors.text-white}"
    rounded: "{rounded.sm}"
    padding: "14px 16px"
    border: "1px solid {colors.border-default}"
  input-focus:
    backgroundColor: "{colors.dark-card}"
    textColor: "{colors.text-white}"
    rounded: "{rounded.sm}"
    padding: "14px 16px"
    border: "1px solid {colors.signal-violet}"
  nav-link:
    textColor: "{colors.text-dim}"
    rounded: "{rounded.pill}"
    typography: "{typography.body}"
  stat-number:
    fontSize: "clamp(2rem, 4vw, 3rem)"
    fontWeight: 800
    lineHeight: 1
    letterSpacing: "-0.03em"
---

# Design System: Qrenda

## 1. Overview

**Creative North Star: "The Signal Tower"**

Dark as a night sky. Signal Violet as a beacon. Everything is built around that one strong signal — precise, warm, unmistakable. The interface doesn't shout; it glows.

Crisp and human — a dark interface that doesn't feel cold. The purple accent brings warmth; typography brings clarity. Professional without being sterile. Every element earns its place; the purple accent is rare and therefore powerful. Typography carries the hierarchy, not decoration.

This system explicitly rejects: SaaS cliché templates (identical card grids, gradient text, hero-metric numbers, beige/sand/warm-neutral body backgrounds), editorial-magazine aesthetics, glassmorphism, side-stripe borders, and the tiny-uppercase-tracked-eyebrow pattern repeated above every section.

**Key Characteristics:**
- Dark tonal surface hierarchy (bg → surface → card → card-hover) as the sole depth mechanism at rest
- A single luminous purple accent (Signal Violet) used on ≤15% of any screen
- Generous, fluid typography with Inter as the sole family
- Tactile, weighted interactions — buttons lift, cards float, inputs glow on focus
- Reduced motion respected; motion is choreographed for the hero load then scroll-reveals that feel earned

## 2. Colors

Signal Violet on black concrete. The palette is deliberately narrow: one luminous accent against a stepped dark neutral scale. The rarity of the accent is the point.

### Primary

- **Signal Violet** (`#8b5cf6`): Exclusive use on primary CTAs, active borders, section labels, and the hero glow. Never used as a background fill larger than a button. Appears as a gradient (`linear-gradient(135deg, #8b5cf6, #7c3aed)`) on primary buttons and the featured pricing badge.

- **Signal Violet Hover** (`#7c3aed`): Button hover state, deeper glow.

- **Signal Violet Deep** (`#6d28d9`): The darker edge of the primary gradient.

### Semantic

- **Success Green** (`#22c55e`): Checkmarks in pricing feature lists only. Not used elsewhere.

### Neutral

- **Night** (`#0a0a0a`): Body background. The darkest tone; full-bleed at top and bottom.
- **Asphalt** (`#111111`): Surface background — trust bar, pricing section, contact section.
- **Concrete** (`#141414`): Card and input background; the most common surface color.
- **Concrete Hover** (`#1a1a1a`): Hover state for cards and contact items.
- **White** (`#ffffff`): Primary text, hero headings, stat numbers.
- **Gravel** (`#a1a1aa`): Body text, nav links, card descriptions, secondary content.
- **Muted Gravel** (`#71717a`): Muted text, placeholders, price periods, footnote copy.
- **Border** (`#27272a`): Default card, input, and section borders.
- **Border Subtle** (`#1e1e1e`): Section dividers (trust bar top/bottom, footer top, logo bar top).

### Named Rules

**The Signal Rule.** Signal Violet occupies ≤15% of any viewport. Its rarity is the source of its power. If a section needs more color, it's a sign the composition isn't carrying its weight.

**The Dark Concrete Rule.** All neutrals lean cool and matte. No warm undertones, no glossy surfaces. The dark is a material, not an absence.

## 3. Typography

**Display Font:** Inter (with system-ui, -apple-system, sans-serif fallback)
**Body Font:** Inter (same stack)
**Label/Mono Font:** Inter (same stack)

**Character:** Single-family precision. Inter's neutral warmth — geometric but humanist in its proportions — supports both the sharp display scale and the comfortable body text. No pairing needed when the weight-and-size contrast is committed enough.

### Hierarchy

- **Display** (700, `clamp(2.5rem, 5.5vw, 4rem)`, 1.1, `-0.03em`): Hero headlines only. `text-wrap: balance`. Tight tracking for impact. Never used outside the top section.

- **Headline** (700, `clamp(1.75rem, 3.5vw, 2.5rem)`, 1.2, `-0.02em`): Section titles. `text-wrap: balance`. Max-width 600px centered or full-width aligned left.

- **Title** (600, `1.125rem`, 1.3): Feature/service card headings, pricing plan names, testimony names.

- **Body** (400, `0.9375rem`, 1.7): Paragraphs, card content, feature descriptions. Cap line length at 65–75ch. `text-wrap: pretty` on long prose.

- **Label** (600, `0.75rem`, 1.3, `0.1em`, uppercase): Section labels (used sparingly — at most one per page, never on every section). Also button text.

### Named Rules

**The One Step Rule.** Never use more than two steps from the hierarchy on any single card or section. If Display is present, nothing else above it competes.

## 4. Elevation

The system uses tonal layering, not shadows, as its primary depth mechanism. At rest, every surface is flat — no drop shadows, no inset shadows, no fake depth. Depth is conveyed purely by lightness: `#0a0a0a` → `#111111` → `#141414` → `#1a1a1a` in the neutral scale.

Shadows appear only as a response to interaction (hover, focus), not as a baseline treatment. This keeps the interface quiet at rest and responsive when engaged.

**The Flat-By-Default Rule.** Surfaces are flat at rest. Shadows appear only as a response to state (hover, focus, active). The tonal hierarchy does the layering work.

## 5. Components

### Buttons

- **Shape:** Pill-shaped (`border-radius: 9999px`). Generous but not cartoonish. The pill is the system's most recognizable silhouette.
- **Primary:** Signal Violet gradient (`linear-gradient(135deg, #8b5cf6, #7c3aed)`) to white text. Padding: 14px 32px. Font: Inter 600, 0.9375rem. Hover: lift 3px with `0 12px 40px rgba(139, 92, 246, 0.45)` shadow. Active: press into hover state.
- **Outline:** Transparent background, white text, `1px solid #27272a` border. Hover: border lightens to `#a1a1aa`, background shifts to `rgba(255,255,255,0.04)`.

### Inputs / Fields

- **Style:** 8px radius (`--q-radius-sm`), `#141414` background, `1px solid #27272a` border. Padding: 14px 16px. Text: white, `0.9375rem`. Placeholder: `#71717a`.
- **Focus:** Border shifts to `#8b5cf6` with a 3px `rgba(139, 92, 246, 0.15)` box-shadow ring. No outline.
- **Disabled:** 0.6 opacity, no focus treatment.

### Cards / Containers

- **Corner Style:** 12px radius (`--q-radius`). This is the system's most common radius — used on service cards, pricing cards, trust stat items, testimonial cards, and bento grid items.
- **Background:** `#141414` (`--q-bg-card`), bordered with `1px solid #27272a`.
- **Shadow Strategy:** None at rest. On hover: lift 4–6px, border gains Signal Violet at 0.3 opacity, soft glow (`0 20px 60px rgba(139, 92, 246, 0.12)`).
- **Internal Padding:** 32px (`--spacing-lg`).

### Navigation

- **Style:** Transparent header, floated. Nav links in `#a1a1aa` at 0.9rem, medium weight. Hover to white.
- **Sign-in button:** White background, near-black text, pill shape, 10px 24px padding. Weight 600.
- **Mobile:** Hamburger with white bars, slide-down menu retains dark surface colors.

### Pricing Card

- **Standard variant:** Same as card base but with `border-radius: 12px`.
- **Featured variant:** Gain an additional ring — Signal Violet border at full opacity, `scale(1.02)` transform, elevated shadow (`0 20px 60px rgba(139, 92, 246, 0.1)`). A gradient pill badge ("Most Popular") floats above at top-center, positioned `-12px`.
- **Pricing amount:** 800 weight, `clamp(2rem, 3vw, 2.5rem)`, `-0.03em` tracking.

### Testimonial Card

- **Base:** Same card shape (12px radius, `#141414` bg, `#27272a` border).
- **Distinctive:** Floating serif open-quote (`\201C`, Georgia, 3rem, `rgba(139, 92, 246, 0.12)`) positioned at top-right. Blockquote text italic, `#a1a1aa`. Author avatar: 44px circle with 2px border that shifts to Signal Violet on card hover.

### Bento Grid Item (About Section)

- **Corner Style:** 12px radius.
- **Background:** Image-cover with a gradient overlay (`#0a0a0a` at bottom to transparent at top).
- **Hover:** Overlay gains a Signal Violet tint (10% opacity). Inner border glow using a `mask-composite: exclude` technique with a purple gradient border. Content text (number, heading, description) sits at z-index 3 above the overlay.

### Bottom CTA

- Full-width dark section with a centered radial glow (Signal Violet at 6% opacity) as a subtle backdrop. Uses the same primary button as the hero. No image, no illustration — the typography and the glow carry it.

## 6. Do's and Don'ts

### Do:

- **Do** use Signal Violet sparingly. If a section has more than one colored element (not counting default borders), it's too much.
- **Do** use the pill shape for all buttons. It's the system's most recognizable silhouette.
- **Do** rely on the tonal hierarchy (bg → surface → card → card-hover) for depth. Shadows are for interaction states only.
- **Do** keep body text at `#a1a1aa` (`--q-text-dim`) or brighter. Muted text (`#71717a`) is for placeholders, footnotes, and secondary metadata only.
- **Do** cap hero heading size at `clamp(2.5rem, 5.5vw, 4rem)`. Above that, the page is shouting.
- **Do** use `text-wrap: balance` on display and headline text. Wrap is a feature, not a bug.
- **Do** use the `q-reveal` scroll animation system for section entrances, with the `q-reveal-visible` class toggled by intersection observer. Include a 0.5s CSS fallback for renderers that can't run JS.
- **Do** test heading copy at every breakpoint. If it overflows on tablet or mobile, reduce the clamp max.
- **Do** respect `prefers-reduced-motion`: transform all reveals, hovers, and entrances to instant transitions.

### Don't:

- **Don't** use gradient text (`background-clip: text` with a gradient). Use solid white or Signal Violet. (The stat-number gradient in the current trust bar is a known violation — planned to be replaced with solid white.)
- **Don't** add side-stripe borders (`border-left` or `border-right` > 1px as a colored accent). Use full borders, background tints, or nothing.
- **Don't** use glassmorphism or decorative backdrop-filter blurs.
- **Don't** repeat tiny uppercase tracked labels above every section. One strong kicker per page is voice; more than one is AI scaffolding.
- **Don't** use numbered section markers (01, 02, 03) as decorative scaffolding. Numbers earn their place only when the section IS a sequence.
- **Don't** use beige, sand, cream, or warm-neutral body backgrounds (the AI default of 2026). This system's surface IS the dark concrete.
- **Don't** use hero-metric templates (big number, small label, supporting stats, gradient accent). The trust stats are the one deliberate exception — they use solid color counters.
- **Don't** use identical card grids with icon + heading + text repeated endlessly. Vary the grid shape (bento, two-column, three-column with size variation).
- **Don't** use monospace fonts as shorthand for "technical." This brand isn't technical; mono reads as costume.
- **Don't** render dropdown navigation inside an `overflow: hidden` container. Use the native popover API, `position: fixed`, or a portal.
- **Don't** gate content visibility behind a class-triggered transition. Scroll reveals must enhance an already-visible default.
